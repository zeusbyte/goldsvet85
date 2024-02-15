<h1>Aapanel/Cpanel/Plesk Casino Server Configuration Guide</h1>

<p align="center">
<img src="https://raw.githubusercontent.com/zeusbyte/goldsvet85/main/slot.png" alt="Alt Text" width="50%">
</p>

<p align="center"><a href="https://casinoplay.win" title="DEMO HERE"><strong>DEMO SITE HERE</strong></a></p>
<p align="center"><strong>⚠️WARNING⚠️</strong></a></p>
<p align="center"><a href="https://github.com/zeusbyte/goldsvet" title=">>> NEW UPDATE HERE <<<<"><strong>>> NEW UPDATE HERE <<</strong></a></p>

<ul>
    <li>Set up your server with the following components:
        <ul>
            <li>OS Almalinux 8 / CentOS 7 recommended</li>
            <li>Apache</li>
            <li>MySQL</li>
            <li>PHP 7.3-7.4</li>
            <li>Laravel 8</li>
            <li>Node.js 16</li>
            <li>PM2</li>
            <li>Redis</li>
        </ul>
    </li>
    <li>Enforce SSL for the domain.</li>
    <li>Extract/Clone this repo into public_html folder</li>
    <li>Enable PHP Extension : Fileinfo, Imagick, Redis</li>
    <li>Create a new email and set a password.</li>
    <li>Create a new database and grant full access.</li>
    <li>Import the SQL file located in the <code>/addons/db.sql</code> directory.</li>
    <li>Ensure SSL is enforced for the domain.</li>
    <li>Run on terminal under public_html folder : composer install </li>
    <li>Generate SSL CRT, KEY, and BUNDLE. Copy the contents of your CRT/KEY/BUNDLE to files in the
        <code>PTWEBSOCKET/SSL/</code> folder. Create a new email and password.</li>
    <li>Create a new database, grant all access, and import the SQL file located in the <code>/addons/db.sql</code>
        folder using PHPMYADMIN.</li>
    <li>For file uploads:
        <ul>
            <li>
                <p dir="auto">//**** Additional tip: As it includes demo user accounts, generate a new password hash
                    for existing users and execute the following in phpMyAdmin (replace the hash)
                    <a href="https://bcrypt-generator.com/" rel="nofollow">https://bcrypt-generator.com/</a>. If
                    you need to hash a new word, for example, run this in phpMyAdmin:</p>
                <p dir="auto">UPDATE w_users SET password =
                    '$2a$12$s1RpwEx/oTL3vYQGZjC33eBHECRJb7gkjmAk9Tmyefub7gQ4nh8XS';</p>
                <p dir="auto">// This ensures all users' passwords are set to: Test123 ********///</p>
            </li>
        </ul>
    </li>
</ul>

<h2>SSL Specific Instructions</h2>

<ul>
    <li>Delete any self-signed certificates.</li>
    <li>Generate or install the Lets Encrypt one if available.</li>
    <li>Save the text file via notepad or directly as follows:
        <ul>
            <li>Certificate (CRT) ==> crt.crt</li>
            <li>Private Key (KEY) --> key.key</li>
        </ul>
    </li>
    <li>Go to the folder <code>PTWebSocket/ssl</code> and replace those three files.</li>
    <li>Edit <code>.env</code> and <code>/config/app.php</code> (URL line 65) for domain, database,
        user/password, email, and password.</li>
</ul>

<h2>File Edits</h2>

<p dir="auto">Edit <code>/public/</code> Socket File Changes in *json files.</p>

<h2>Games Downloads</h2>

<p>Currently, there are approximately 1000 games totaling 40 GB.</p>
<p>Files uploaded soon.. or join our group to get it fast.</p>

<h2>PM2 Commands</h2>

<p>PM2 COMMANDS <a href="https://pm2.keymetrics.io/docs/usage/quick-start/" rel="nofollow">https://pm2.keymetrics.io/docs/usage/quick-start/</a></p>

<p>FROM INSIDE <code>PTWEBSOCKET</code> web folder COMMANDS:</p>
<code>pm2 start Arcade.js --watch</code>
<code>pm2 start Server.js --watch</code>
<code>pm2 start Slots.js --watch</code>

<p>OR if you tested before and not expecting errors, all in one command:</p>
<code>pm2 start Arcade.js --watch &amp;&amp; pm2 start Server.js --watch &amp;&amp; pm2 start Slots.js --watch</code>

<p>SAMPLE USEFUL COMMANDS</p>
<code>pm2 stop all</code>
<code>pm2 delete all</code>
<code>pm2 flush</code>
<code>pm2 logs</code>
<p>All commands on <a href="https://pm2.keymetrics.io/docs/usage/quick-start/" rel="nofollow">https://pm2.keymetrics.io/docs/usage/quick-start/</a></p>

<p>An extra tool called <code>wscat</code> can be used (install via SSH):</p>
<code>wscat -c "wss://domain:PORT/slots"</code>

<p>Example to make sure you get connected.</p>
<p>Open ports in Firewall: <code>22154</code>, <code>22188</code>, <code>22197</code> (or whatever you set your Socket
    file ports to).</p>
<p>Run the site: It should work now if everything was set up correctly.</p>

<h2>Troubleshooting</h2>

<p dir="auto">Minor troubleshooting if your composer/artisan did not run correctly:</p>

<code>php artisan cache:clear &amp;&amp; php artisan view:clear &amp;&amp; php artisan config:clear &amp;&amp; php
    artisan event:clear &amp;&amp; php artisan route:clear</code>

<h2>Have a Problem or Question?</h2>
<p><b>If you have difficulty for setup/installation consider installation services from my telegram.</b></p>

<p dir="auto"><a href="https://t.me/TWFtYWggYWt1IHRha3V0IPCfpK" rel="nofollow">Telegram</a></p>
<p dir="auto"><a href="https://t.me/goldsvetcasino1" rel="nofollow">Telegram Group</a></p>
<p>Discord : @x.111x</p>
<p dir="auto">&nbsp;</p>

## Support the Project

If you find this project useful and would like to show your support, you can make a donation using the following cryptocurrencies:

- **Bitcoin (BTC):**
  - Wallet Address: 18m7QMr7zU6PV9jmPVB1bbb5nE5CbSpjQA

- **Ethereum (ETH):**
  - Wallet Address: 0x5fc161aDa8211982206C7A8ac83140001E9329c9

- **USDT (Tron network):**
  - Wallet Address: TEyxHVmRwjThiNcMJivLjspEeFwW8dunZo

