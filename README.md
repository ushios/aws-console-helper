aws-console-helper
===

# Dependencies

- [aws/aws-sdk-php](https://github.com/aws/aws-sdk-php/)
- [twig/twig](https://github.com/fabpot/Twig) (CLI only)

# Installation

## using CLI interface

    $ git clone https://github.com/ushios/aws-console-helper.git path/to/clone
    $ cd path/to/clone
    $ composer install

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
    $ php ssh_config.php [--private] [--output […]]

---

# Components usage

no documentations now.

---