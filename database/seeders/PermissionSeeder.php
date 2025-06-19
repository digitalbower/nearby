<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $permissions = [
            'view_adminusers',
            'create_adminusers',
            'edit_adminusers',
            'delete_adminusers',
            'view_logos',
            'edit_logos',
            'delete_logos',
            'view_emirates',
            'view_footer',
            'add_footer',
            'delete_footer',
            'view_navigations',
            'create_navigations',
            'edit_navigations',
            'delete_navigations',
            'view_category',
            'create_category',
            'edit_category',
            'delete_category',
            'view_subcategory',
            'create_subcategory',
            'edit_subcategory',
            'delete_subcategory',
            'view_category_unit',
            'create_category_unit',
            'edit_category_unit',
            'delete_category_unit',
            'view_nbvterms',
            'create_nbvterms',
            'edit_nbvterms',
            'delete_nbvterms',
            'changestatus_nbvterms',
            'view_vendor',
            'create_vendor',
            'edit_vendor',
            'delete_vendor',
            'changestatus_vendor',
            'view_vendorterms',
            'create_vendorterms',
            'edit_vendorterms',
            'delete_vendorterms',
            'changestatus_vendorterms',
            'view_salesperson',
            'create_salesperson',
            'edit_salesperson',
            'delete_salesperson',
            'changestatus_salesperson',
            'view_promo',
            'create_promo',
            'edit_promo',
            'delete_promo',
            'changestatus_promo',
            'view_producttype',
            'create_producttype',
            'edit_producttype',
            'delete_producttype',
            'changestatus_producttype',
            'view_products',
            'create_products',
            'edit_products',
            'delete_products',
            'changestatus_products',
            'view_productvariants',
            'create_productvariants',
            'edit_productvariants',
            'delete_productvariants',
            'changestatus_productvariants',
            'view_report',
            'changestatus_report',
            'delete_report',
            'view_commission',
            'download_commission',
            'view_seo',
            'create_seo',
            'edit_seo',
            'view_vendor_credential',
            'edit_vendor_credential',
            'create_unit_type',
            'edit_unit_type',
            'delete_unit_type',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
