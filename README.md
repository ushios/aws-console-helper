aws-console-helper
===

# Dependencies

- [aws/aws-sdk-php](https://github.com/aws/aws-sdk-php/)
- [twig/twig](https://github.com/fabpot/Twig) (CLI only)

# Installation

## using in CLI

    $ git clone https://github.com/ushios/aws-console-helper.git path/to/clone
    $ cd path/to/clone
    $ composer install
    $
    $ cd Resources
    $ cp config.json.dist config.json
    $ vi config.json # edit aws credential infos.

## using components

    composer.json
    
    require: {
        ...
        "ushios/aws-console-helper": "0.0.*",
        ...
    }

---

# CLI usage

## create .ssh/config

    $ cd path/to/clone
    $ php ssh_config.php [--private] [--no-hostkey-checking] [--output […]] [--user […]] [--identity_file […]]

---

# Components usage

no documentations now.

---
