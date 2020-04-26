<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    /*
     * s01:user->9, role->10, permission->11
     * s02:company->12, employee->13, customer->14, manufacturer->15, product_categories->16, product->17
     * */
    public function run()
    {
        $permissions = [
            /*第一層*/
            [
                'name' => 's01',
                'parent_id' => '#',
                'display_name' => 'Управление системой',
                'description' => '#',
                'status' => '1',
                'route'=>'#'
            ],
            [
                'name' => 's02',
                'parent_id' => '#',
                'display_name' => 'Основы управления информацией',
                'description' => '#',
                'status' => '1',
                'route'=>'#'
            ],
            [
                'name' => 's03',
                'parent_id' => '#',
                'display_name' => 'Управление запасами',
                'description' => '#',
                'status' => '1',
                'route'=>'#'
            ],
            [
                'name' => 's04',
                'parent_id' => '#',
                'display_name' => 'Управление продажами',
                'description' => '#',
                'status' => '1',
                'route'=>'#'
            ],
            [
                'name' => 's05',
                'parent_id' => '#',
                'display_name' => 'Управление акциями',
                'description' => '#',
                'status' => '1',
                'route'=>'#'
            ],
            [
                'name' => 's06',
                'parent_id' => '#',
                'display_name' => 'Управление бухгалтерским учетом',
                'description' => '#',
                'status' => '1',
                'route'=>'#'
            ],
            [
                'name' => 's07',
                'parent_id' => '#',
                'display_name' => 'Банкнота',
                'description' => '#',
                'status' => '1',
                'route'=>'#'
            ],
            [
                'name' => 's08',
                'parent_id' => '#',
                'display_name' => 'Статистический отчет',
                'description' => '#',
                'status' => '1',
                'route'=>'#'
            ],
            /*第二層*/
            [
                'name' => 'user-index',
                'parent_id' => '1',
                'display_name' => 'Управление аккаунтом',
                'description' => '#',
                'status' => '1',
                'route'=>'users.index'
            ],
            [
                'name' => 'role-index',
                'parent_id' => '1',
                'display_name' => 'Управление группой',
                'description' => '#',
                'status' => '1',
                'route'=>'roles.index'
            ],
            [
                'name' => 'permission-index',
                'parent_id' => '1',
                'display_name' => 'Управление полномочиями',
                'description' => '#',
                'status' => '1',
                'route'=>'permissions.index'
            ],
            [
                'name' => 'company-index',
                'parent_id' => '2',
                'display_name' => 'Информация о компании',
                'description' => '#',
                'status' => '1',
                'route'=>'company.index'
            ],
            [
                'name' => 'employee-index',
                'parent_id' => '2',
                'display_name' => 'Информация о сотруднике',
                'description' => '#',
                'status' => '1',
                'route'=>'employee.index'
            ],
            [
                'name' => 'customer-index',
                'parent_id' => '2',
                'display_name' => 'Информация для клиентов',
                'description' => '#',
                'status' => '1',
                'route'=>'customer.index'
            ],
            [
                'name' => 'manufacturer-index',
                'parent_id' => '2',
                'display_name' => 'Информация о производителе',
                'description' => '#',
                'status' => '1',
                'route'=>'manufacturer.index'
            ],
            [
                'name' => 'product_categories-index',
                'parent_id' => '2',
                'display_name' => 'Товарная классификация',
                'description' => '#',
                'status' => '1',
                'route'=>'product_categories.index'
            ],
            [
                'name' => 'product-index',
                'parent_id' => '2',
                'display_name' => 'Информация о продукте',
                'description' => '#',
                'status' => '1',
                'route'=>'product.index'
            ],
            [
                'name' => 'commoncode-index',
                'parent_id' => '2',
                'display_name' => 'Общий код',
                'description' => '#',
                'status' => '1',
                'route'=>'commoncode.index'
            ],
            [
                'name' => 'purchase-index',
                'parent_id' => '3',
                'display_name' => 'Обслуживание покупки',
                'description' => '#',
                'status' => '1',
                'route'=>'purchase.index'
            ],
            [
                'name' => 'purchase_return-index',
                'parent_id' => '3',
                'display_name' => 'Возврат обслуживания',
                'description' => '#',
                'status' => '1',
                'route'=>'purchase_return.index'
            ],
            [
                'name' => 'sale-index',
                'parent_id' => '4',
                'display_name' => 'Сопровождение продаж',
                'description' => '#',
                'status' => '1',
                'route'=>'sale.index'
            ],
            [
                'name' => 'sale_return-index',
                'parent_id' => '4',
                'display_name' => 'Обработка возврата',
                'description' => '#',
                'status' => '1',
                'route'=>'sale_return.index'
            ],

            /*第三層*/
            [
                'name' => 'user-show',
                'parent_id' => '9',
                'display_name' => 'Содержание аккаунта',
                'description' => 'Показать содержимое аккаунта',
                'status' => '1',
                'route'=>'users.show'
            ],
            [
                'name' => 'user-create',
                'parent_id' => '9',
                'display_name' => 'создать аккаунт',
                'description' => 'создать аккаунт',
                'status' => '1',
                'route'=>'users.create'
            ],
            [
                'name' => 'user-edit',
                'parent_id' => '9',
                'display_name' => 'Редактирвать аккаунт',
                'description' => 'Редактирвать аккаунт',
                'status' => '1',
                'route'=>'users.edit'
            ],
            [
                'name' => 'user-status',
                'parent_id' => '9',
                'display_name' => 'статус аккаунта',
                'description' => 'Аккаунт Включить | Отключить',
                'status' => '1',
                'route'=>'users.status'
            ],
            [
                'name' => 'user-delete',
                'parent_id' => '9',
                'display_name' => 'Удаление аккаунта',
                'description' => 'Удаление аккаунта',
                'status' => '1',
                'route'=>'users.destroy'
            ],
            [
                'name' => 'role-show',
                'parent_id' => '10',
                'display_name' => 'Просмотр должность',
                'description' => 'Просмотр должность',
                'status' => '1',
                'route'=>'roles.show'
            ],
            [
                'name' => 'role-create',
                'parent_id' => '10',
                'display_name' => 'Создать должность',
                'description' => 'Создать должность',
                'status' => '1',
                'route'=>'roles.create'
            ],
            [
                'name' => 'role-edit',
                'parent_id' => '10',
                'display_name' => 'Редактировать должность',
                'description' => 'Редактировать должность',
                'status' => '1',
                'route'=>'roles.edit'
            ],
            [
                'name' => 'role-delete',
                'parent_id' => '10',
                'display_name' => 'Удалить должность',
                'description' => '角色刪除',
                'status' => '1',
                'route'=>'roles.destroy'
            ],
            [
                'name' => 'permission-show',
                'parent_id' => '11',
                'display_name' => 'Просмотр разрешений',
                'description' => 'Просмотр разрешений',
                'status' => '1',
                'route'=>'permissions.show'
            ],
            [
                'name' => 'permission-edit',
                'parent_id' => '11',
                'display_name' => 'Редактировать разрешений',
                'description' => 'Редактировать разрешений',
                'status' => '1',
                'route'=>'permissions.edit'
            ],
            [
                'name' => 'permission-status',
                'parent_id' => '11',
                'display_name' => 'Статус разрешения',
                'description' => 'Отабражать | не отабражать',
                'status' => '1',
                'route'=>'permissions.status'
            ],
            [
                'name' => 'company-show',
                'parent_id' => '12',
                'display_name' => 'Информация о компании',
                'description' => 'Информация о компании',
                'status' => '1',
                'route'=>'company.show'
            ],
            [
                'name' => 'company-edit',
                'parent_id' => '12',
                'display_name' => 'Изменение информации о компании',
                'description' => 'Изменение информации о компании',
                'status' => '1',
                'route'=>'company.edit'
            ],
            [
                'name' => 'employee-show',
                'parent_id' => '13',
                'display_name' => 'Информация о сотруднике',
                'description' => 'Показать информацию о сотруднике',
                'status' => '1',
                'route'=>'employees.show'
            ],
            [
                'name' => 'employee-edit',
                'parent_id' => '13',
                'display_name' => 'Изменение информации о сотруднике',
                'description' => 'Изменение информации о сотруднике',
                'status' => '1',
                'route'=>'employee.edit'
            ],
            [
                'name' => 'customer-show',
                'parent_id' => '14',
                'display_name' => 'Информация для клиентов',
                'description' => 'Показать информацию о клиенте',
                'status' => '1',
                'route'=>'customer.show'
            ],
            [
                'name' => 'customer-create',
                'parent_id' => '14',
                'display_name' => 'создать клиента',
                'description' => 'создать клиента',
                'status' => '1',
                'route'=>'customer.create'
            ],
            [
                'name' => 'customer-edit',
                'parent_id' => '14',
                'display_name' => 'Редактирование клиента',
                'description' => 'Редактирование клиента',
                'status' => '1',
                'route'=>'customer.edit'
            ],
            [
                'name' => 'customer-status',
                'parent_id' => '14',
                'display_name' => 'статус клиента',
                'description' => 'Клиент включить | отключить',
                'status' => '1',
                'route'=>'customer.status'
            ],
            [
                'name' => 'manufacturer-show',
                'parent_id' => '15',
                'display_name' => 'Просмотр производителя',
                'description' => 'Просмотр производителя',
                'status' => '1',
                'route'=>'manufacturer.create'
            ],
            [
                'name' => 'manufacturer-create',
                'parent_id' => '15',
                'display_name' => 'Создать производителя',
                'description' => 'Создать производителя',
                'status' => '1',
                'route'=>'manufacturer.create'
            ],
            [
                'name' => 'manufacturer-edit',
                'parent_id' => '15',
                'display_name' => 'Редактирвать производителя',
                'description' => 'Редактирвать производителя',
                'status' => '1',
                'route'=>'manufacturer.edit'
            ],
            [
                'name' => 'manufacturer-status',
                'parent_id' => '15',
                'display_name' => 'Статус производителя',
                'description' => 'Поставщик включить | отключить',
                'status' => '1',
                'route'=>'manufacturer.status'
            ],
            [
                'name' => 'product_categories-create',
                'parent_id' => '16',
                'display_name' => 'Новая категория продуктов',
                'description' => 'Новая категория продуктов',
                'status' => '1',
                'route'=>'product_categories.create'
            ],
            [
                'name' => 'product_categories-edit',
                'parent_id' => '16',
                'display_name' => 'Модификация товарной категории',
                'description' => 'Модификация товарной категории',
                'status' => '1',
                'route'=>'product_categories.edit'
            ],
            [
                'name' => 'product-show',
                'parent_id' => '17',
                'display_name' => 'Просмотр продукта',
                'description' => 'Просмотр продукта',
                'status' => '1',
                'route'=>'product.create'
            ],
            [
                'name' => 'product-create',
                'parent_id' => '17',
                'display_name' => 'Создать продукт',
                'description' => 'Создать продукт',
                'status' => '1',
                'route'=>'product.create'
            ],
            [
                'name' => 'product-edit',
                'parent_id' => '17',
                'display_name' => 'Редактировать продукт',
                'description' => 'Редактировать продукт',
                'status' => '1',
                'route'=>'product.edit'
            ],
            [
                'name' => 'product-status',
                'parent_id' => '17',
                'display_name' => 'Статус товара',
                'description' => 'Статус товара',
                'status' => '1',
                'route'=>'product.status'
            ],
            [
                'name' => 'commoncode-show',
                'parent_id' => '18',
                'display_name' => 'Просмотр общего кода',
                'description' => 'Просмотр общего кода',
                'status' => '1',
                'route'=>'commoncode.create'
            ],
            [
                'name' => 'commoncode-create',
                'parent_id' => '18',
                'display_name' => 'Создание общего кода',
                'description' => 'Создание общего кода',
                'status' => '1',
                'route'=>'commoncode.create'
            ],
            [
                'name' => 'commoncode-edit',
                'parent_id' => '18',
                'display_name' => 'Редактировать общий код',
                'description' => 'Редактировать общий код',
                'status' => '1',
                'route'=>'commoncode.edit'
            ],
        ];

        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }
    }
}
