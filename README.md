# colin1124x/auth-basic

```php

// 建構一個 basic 驗證物件

$basic = new Rde\Auth\Basic(array(
    'user_name' => 'encode_password', // 請使用 password_hash
));

// 登入判斷

$basic->isAuthorized() or $basic->challenge();

```
