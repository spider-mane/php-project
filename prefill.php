<?php
define('COL_DESCRIPTION', 0);
define('COL_HELP', 1);
define('COL_DEFAULT', 2);

$name = trim(shell_exec('git config user.name'));
$email = trim(shell_exec('git config user.email'));

// exit(var_dump($name, $email));

$fields = [
    'author_name' => ['Your name', '', $name],
    'author_github_username' => ['Your Github username', '<username> in https://github.com/username', ''],
    'author_email' => ['Your email address', '', $email],
    'author_website' => ['Your website', '', 'https://github.com/{author_github_username}'],

    'vendor_name' => ['Package vendor', '', '{author_github_username}'],
    'vendor_github' => ['Vendor github name', '', '{vendor_name}'],

    'package_name' => ['Package name', '', ''],
    'package_website' => ['Package website', '', 'https://github.com/{vendor_github}/{package_name}'],
    'package_description' => ['Package very short description', '', ''],

    'psr4_namespace' => ['PSR-4 namespace', 'usually, Vendor\\Package', ''],
];

$values = [];

$replacements = [
    ':vendor_name\\\\:package_name\\\\' => function () use (&$values) {
        return str_replace('\\', '\\\\', $values['psr4_namespace']) . '\\\\';
    },
    ':author_name' => function () use (&$values) {
        return $values['author_name'];
    },
    ':author_username' => function () use (&$values) {
        return $values['author_github_username'];
    },
    ':author_website' => function () use (&$values) {
        return $values['author_website'] ?: ('https://github.com/' . $values['author_github_username']);
    },
    ':author_email' => function () use (&$values) {
        return $values['author_email'] ?: ($values['author_github_username'] . '@example.com');
    },
    ':vendor_name' => function () use (&$values) {
        return $values['vendor_name'];
    },
    ':vendor_github' => function () use (&$values) {
        return $values['vendor_github'];
    },
    ':package_name' => function () use (&$values) {
        return $values['package_name'];
    },
    ':package_website' => function () use (&$values) {
        return $values['package_website'];
    },
    ':package_description' => function () use (&$values) {
        return $values['package_description'];
    },
    'Vendor\\Package' => function () use (&$values) {
        return $values['psr4_namespace'];
    },
];

function read_from_console($prompt)
{
    if (function_exists('readline')) {
        $line = trim(readline($prompt));
        if (!empty($line)) {
            readline_add_history($line);
        }
    } else {
        echo $prompt;
        $line = trim(fgets(STDIN));
    }
    return $line;
}

function interpolate($text, $values)
{
    if (!preg_match_all('/\{(\w+)\}/', $text, $m)) {
        return $text;
    }
    foreach ($m[0] as $k => $str) {
        $f = $m[1][$k];
        $text = str_replace($str, $values[$f], $text);
    }
    return $text;
}

$modify = 'n';
do {
    if ($modify == 'q') {
        exit;
    }

    $values = [];

    echo "----------------------------------------------------------------------\n";
    echo "Please, provide the following information:\n";
    echo "----------------------------------------------------------------------\n";
    foreach ($fields as $f => $field) {
        $default = isset($field[COL_DEFAULT]) ? interpolate($field[COL_DEFAULT], $values) : '';
        $prompt = sprintf(
            '%s%s%s: ',
            $field[COL_DESCRIPTION],
            $field[COL_HELP] ? ' (' . $field[COL_HELP] . ')' : '',
            $field[COL_DEFAULT] !== '' ? ' [' . $default . ']' : ''
        );
        $values[$f] = read_from_console($prompt);
        if (empty($values[$f])) {
            $values[$f] = $default;
        }
    }
    echo "\n";

    echo "----------------------------------------------------------------------\n";
    echo "Please, check that everything is correct:\n";
    echo "----------------------------------------------------------------------\n";
    foreach ($fields as $f => $field) {
        echo $field[COL_DESCRIPTION] . ": $values[$f]\n";
    }
    echo "\n";
} while (($modify = strtolower(read_from_console('Modify files with these values? [y/N/q] '))) != 'y');
echo "\n";

$files = array_merge(
    glob(__DIR__ . '/*.md'),
    glob(__DIR__ . '/*.xml.dist'),
    glob(__DIR__ . '/composer.json'),
    glob(__DIR__ . '/src/*.php'),
    glob(__DIR__ . '/tests/*.php')
);
foreach ($files as $f) {
    $contents = file_get_contents($f);
    foreach ($replacements as $str => $func) {
        $contents = str_replace($str, $func(), $contents);
    }
    file_put_contents($f, $contents);
}

echo "Done.\n";

// shell_exec('rm -rf .git');
// shell_exec('git init');

# echo "Replaced all values and reset git directory, self destructing in 3... 2... 1..."

// shell_exec('rm ' . __FILE__);

// echo "Now you should remove the file '" . basename(__FILE__) . "'.\n";
