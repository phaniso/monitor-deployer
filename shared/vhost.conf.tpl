<VirtualHost *:80>
    ServerName      {{app.domain}}
    DocumentRoot    {{deploy_path}}/current/public/
    ErrorLog        {{deploy_path}}/current/tmp/logs/apache-error.log
    CustomLog       {{deploy_path}}/current/tmp/logs/apache-access.log combined

    <Directory {{deploy_path}}/current/public/>
        AllowOverride All
        Options +FollowSymLinks
        <RequireAny>
            Require all granted
        </RequireAny>
    </Directory>
</VirtualHost>