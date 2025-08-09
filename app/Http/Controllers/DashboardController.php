<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
    $productsOdooRaw = DB::connection('pgsql')->select("
        SELECT
        pt.id AS template_id,
        pp.id AS product_id,
        pt.name AS product_name,
        pp.default_code AS sku,
        pt.list_price AS sale_price,
        pp.standard_price AS cost_price,
        uom.name AS uom_name,
        pc.name AS category_name,
        COALESCE(SUM(sq.quantity), 0) AS total_stock,
        pt.create_date,
        pt.write_date
        FROM product_template pt
        JOIN product_product pp ON pp.product_tmpl_id = pt.id
        LEFT JOIN uom_uom uom ON uom.id = pt.uom_id
        LEFT JOIN product_category pc ON pc.id = pt.categ_id
        LEFT JOIN stock_quant sq ON sq.product_id = pp.id
        GROUP BY
        pt.id, pp.id, pt.name, pp.default_code, pt.list_price,
        pp.standard_price, uom.name, pc.name, pt.create_date, pt.write_date
        ORDER BY pt.name
    ");

    $productsOdoo = [];
    foreach ($productsOdooRaw as $p) {
        $productName = is_string($p->product_name) && str_starts_with($p->product_name, '{')
        ? json_decode($p->product_name, true)['en_US'] ?? $p->product_name
        : $p->product_name;

        $uomName = is_string($p->uom_name) && str_starts_with($p->uom_name, '{')
        ? json_decode($p->uom_name, true)['en_US'] ?? $p->uom_name
        : $p->uom_name;

        $costPrice = is_string($p->cost_price) && str_starts_with($p->cost_price, '{')
        ? (float) (json_decode($p->cost_price, true)['1'] ?? 0)
        : (float) $p->cost_price;

        $productsOdoo[] = (object)[
            'template_id'   => $p->template_id,
            'product_id'    => $p->product_id,
            'product_name'  => $productName,
            'sku'           => $p->sku,
            'sale_price'    => (float) $p->sale_price,
            'cost_price'    => $costPrice,
            'uom_name'      => $uomName,
            'category_name' => $p->category_name,
            'total_stock'   => (float) $p->total_stock,
            'create_date'   => $p->create_date,
            'write_date'    => $p->write_date,
        ];
    }

        $productsBackup = DB::connection('sqlsrv')->table('backup_products')->get();

        $totalProductsOdoo = count($productsOdoo);
        $totalProductsBackup = $productsBackup->count();

        return view('dashboard.index', compact('productsOdoo', 'productsBackup', 'totalProductsOdoo', 'totalProductsBackup'));
    }

    public function backup()
    {
        $products = DB::connection('pgsql')->select("
            SELECT
                pt.id AS template_id,
                pp.id AS product_id,
                pt.name AS product_name,
                pp.default_code AS sku,
                pt.list_price AS sale_price,
                pp.standard_price AS cost_price,
                uom.name AS uom_name,
                pc.name AS category_name,
                COALESCE(SUM(sq.quantity), 0) AS total_stock,
                pt.create_date,
                pt.write_date
            FROM product_template pt
            JOIN product_product pp ON pp.product_tmpl_id = pt.id
            LEFT JOIN uom_uom uom ON uom.id = pt.uom_id
            LEFT JOIN product_category pc ON pc.id = pt.categ_id
            LEFT JOIN stock_quant sq ON sq.product_id = pp.id
            GROUP BY
                pt.id, pp.id, pt.name, pp.default_code, pt.list_price,
                pp.standard_price, uom.name, pc.name, pt.create_date, pt.write_date
            ORDER BY pt.name
        ");

        foreach ($products as $p) {
            $productName = is_string($p->product_name) && str_starts_with($p->product_name, '{')
                ? json_decode($p->product_name, true)['en_US'] ?? $p->product_name
                : $p->product_name;

            $uomName = is_string($p->uom_name) && str_starts_with($p->uom_name, '{')
                ? json_decode($p->uom_name, true)['en_US'] ?? $p->uom_name
                : $p->uom_name;

            $costPrice = is_string($p->cost_price) && str_starts_with($p->cost_price, '{')
                ? (float) (json_decode($p->cost_price, true)['1'] ?? 0)
                : (float) $p->cost_price;

            DB::connection('sqlsrv')->table('backup_products')->insert([
                'template_id'   => $p->template_id,
                'product_id'    => $p->product_id,
                'product_name'  => $productName,
                'sku'           => $p->sku,
                'sale_price'    => (float) $p->sale_price,
                'cost_price'    => $costPrice,
                'uom_name'      => $uomName,
                'category_name' => $p->category_name,
                'total_stock'   => (float) $p->total_stock,
                'create_date'   => \Carbon\Carbon::parse($p->create_date)->format('Y-m-d H:i:s'),
                'write_date'    => \Carbon\Carbon::parse($p->write_date)->format('Y-m-d H:i:s'),
                'backup_at'     => now()->format('Y-m-d H:i:s')
            ]);
        }



        return back()->with('success', 'Backup produk berhasil!');
    }
}
