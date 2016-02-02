<?php
// All Deployer recipes are based on `recipe/common.php`.
require 'recipe/codeigniter.php';
require 'vendor/deployphp/recipes/recipes/configure.php';
// Define a server for deployment.
// Let's name it "prod" and use port 22.
set('keep_releases', 5);
/*set('shared_dirs', [
    'application',
]);
*/
set('shared_files',
    [
        'application/config/config.php',
    ]
);

set('repository', 'https://github.com/phaniso/Multi-Server-WWW.git');

task('deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:vendors',
    'deploy:symlink',
    'cleanup',
])->desc('Deploy your project');
after('deploy', 'deploy:configure');
after('deploy', 'success');

serverList('config/servers.yml');
