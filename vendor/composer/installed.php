<?php return array(
    'root' => array(
        'name' => 'letom/projet-msi',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => NULL,
        'type' => 'project',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'friendsofphp/php-cs-fixer' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => 'v3.48.0',
            ),
        ),
        'letom/projet-msi' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => NULL,
            'type' => 'project',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'php-cs-fixer/shim' => array(
            'pretty_version' => 'v3.48.0',
            'version' => '3.48.0.0',
            'reference' => 'bf0c65f1b2d943306b3574d42ae806578ce9cc3e',
            'type' => 'application',
            'install_path' => __DIR__ . '/../php-cs-fixer/shim',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
    ),
);
