E-commerce larevel + livewire

Ứng dụng larevel đầu tiên của tôi

Trang quản trị

Đa thuộc tính sản phẩm, discount, coupon<br/>
Đăng nhập facebook, google, github<br/>
Thanh toán thông qua các api bên thứ 3 stripe, paypal, vnpay<br/>
Đặt hàng thông qua api giao hàng nhanh<br/>
Theo dõi đơn hàng

Các bước setup
```
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
```

```
php artisan view:clear
php artisan view:cache
php artisan optimize
```

Note: nhớ thay đổi client_id, secret_id của các api bên thứ 3

Live demo: http://skinest.herokuapp.com/home
