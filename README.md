# 🚀 Shop Setup Guide

Welcome to the setup guide for customizing your shop. Follow the steps below to get everything running smoothly. If you need any assistance, feel free to contact me on Telegram at **@uhq69**. I also accept custom orders and design requests. Let's get started! 🛠️

## 📝 Step 1: Update Your Shop Links

To ensure the scripts work correctly, you need to update the shop links in the `scrape.php` and `scrape_vouches.php` files.

### 🔧 Updating `scrape.php`

1. Open the `server/scrape.php` file.
2. Find the following line:

   ```php
   curl_setopt($ch, CURLOPT_URL, 'https://hqlogs.sellpass.io/products');
   ```

3. **Replace** `'https://hqlogs.sellpass.io/products'` with your shop's product URL. For example:

   ```php
   curl_setopt($ch, CURLOPT_URL, 'https://yourshopdomain.com/products');
   ```

4. Save the changes.

### 🔧 Updating `scrape_vouches.php`

1. Open the `server/scrape_vouches.php` file.
2. Find the line with:

   ```php
   $ch = curl_init('https://hqlogs.sellpass.io/reviews');
   ```

3. **Replace** `'https://hqlogs.sellpass.io/reviews'` with your shop's reviews URL. For example:

   ```php
   $ch = curl_init('https://yourshopdomain.com/reviews');
   ```

4. Save the changes.

## 🛠️ Step 2: Refresh the Data

After updating the links, you need to refresh the data by calling the following URLs:

1. **Update Products Data:**
   - Go to: `http://yourdomain.com/server/scrape.php?action=update`
   
   Replace `yourdomain.com` with your actual domain.

2. **Update Vouches Data:**
   - Go to: `http://yourdomain.com/server/scrape_vouches.php?action=update_vouches`

## 🎨 Step 3: Customize Your Shop's Header

1. Open the `includes/header.php` file.
2. Change the shop name and links in the navigation bar to match your shop’s details.
3. You can also modify the design of the header to better suit your brand.

## 📞 Need Help?

For any help with customizing your shop or if you’re looking for a unique design, feel free to contact me:

- **Telegram**: [@uhq69](https://t.me/uhq69) 📲
- **Custom Orders**: I’m available for custom work to tailor the shop exactly to your needs. 

**Don’t hesitate to reach out!** I’m here to help make your shop look and perform exactly how you want it to. 🛒🖥️

---

### 🌟 Additional Tips

- Make sure your `cache_file` paths are writable to avoid any permission issues.
- Use placeholders or default images when links are broken to ensure a smooth user experience.
- Regularly update your `scrape.php` and `scrape_vouches.php` to keep your product and review data fresh.

---

Thanks for using my script! If you enjoy the design, please consider sharing your feedback. 🎉
