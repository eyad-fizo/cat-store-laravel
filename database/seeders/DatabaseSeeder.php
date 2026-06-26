<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. إنشاء الصلاحيات الأساسية في قاعدة البيانات
        $adminRole = Role::updateOrCreate(['name' => 'admin'], ['description' => 'Administrator']);
        $userRole = Role::updateOrCreate(['name' => 'user'], ['description' => 'Regular User']);

        // 2. إنشاء حساب الأدمن الافتراضي للاختبار المحلي فقط
        //    ملاحظة: غيّر هذا البريد وكلمة المرور قبل أي نشر فعلي (production)
        $adminUser = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Store Admin',
                'password' => Hash::make('ChangeMe123!'),
            ]
        );

        // 3. ربط حساب الأدمن بالصلاحيات في جدول الربط
        $adminUser->roles()->syncWithoutDetaching([$adminRole->id, $userRole->id]);

        // 4. إنشاء أقسام افتراضية لمنتجات القطط
        Category::updateOrCreate(['title' => 'Cat Food & Treats'], ['status' => true]);
        Category::updateOrCreate(['title' => 'Cat Toys & Games'], ['status' => true]);
        Category::updateOrCreate(['title' => 'Beds & Furniture'], ['status' => true]);
    }
}