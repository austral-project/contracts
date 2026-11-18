# Austral Contracts

[![Version](https://img.shields.io/packagist/v/austral/contracts?label=version)](https://packagist.org/packages/austral/contracts)
[![CI](https://github.com/austral-project/contracts/actions/workflows/ci.yml/badge.svg?branch=4.x)](https://github.com/austral-project/contracts/actions/workflows/ci.yml)
[![PHP](https://img.shields.io/packagist/dependency-v/austral/contracts/php)](https://packagist.org/packages/austral/contracts)
[![Symfony](https://img.shields.io/badge/symfony-7.4-black)](https://symfony.com/releases/7.4)
[![License](https://img.shields.io/packagist/l/austral/contracts)](LICENSE)

Shared abstractions of the [Austral](https://austral.dev) bundles: interfaces, small value objects and enums.

This is **layer 0** of Austral V4. Every Austral bundle may depend on it; it depends on no Austral bundle.
When a bundle needs something from another bundle that is not below it, it goes through a contract defined here,
never through the concrete classes of the other bundle.

## Installation

```bash
composer require austral/contracts
```

Requires PHP 8.2 or higher. It is not a Symfony bundle: there is nothing to register in `config/bundles.php`.

## Content

| Namespace | Contract | Implemented by |
|-----------|----------|----------------|
| `Austral\Contracts\Entity` | `EntityInterface` | entity-bundle (`Entity`) |
| `Austral\Contracts\Translate` | `TranslateMasterInterface`, `TranslateChildInterface` | entity-translate-bundle |
| `Austral\Contracts\File` | `FileInterface` | entity-file-bundle |
| `Austral\Contracts\Domain` | `FilterByDomainInterface` | http-bundle |
| `Austral\Contracts\Link` | `LinkResolverInterface`, `ResolvedLink` | seo-bundle |
| `Austral\Contracts\Enum` | `PublicationStatus` | — |

### Internal links

```php
use Austral\Contracts\Link\LinkResolverInterface;

final class LinkRenderer
{
  public function __construct(private ?LinkResolverInterface $linkResolver = null) {}

  public function url(string $entityClass, string $id): ?string
  {
    // Without seo-bundle there is no resolver: internal links are not resolved.
    return $this->linkResolver?->resolve($entityClass, $id)?->url;
  }
}
```

## Rules

What can go in this package:

- interfaces, enums, value objects and events shared by **several** bundles;
- no service, no configuration, no Symfony bundle class;
- no reference to an Austral bundle nor to `App\` (checked by `tests/ContractsTest.php`);
- dependencies limited to `doctrine/collections` and `symfony/http-foundation`.

A contract used by a single bundle, or only by bundles that already depend on its owner, stays in that bundle.

## Development

```bash
composer install
composer test
composer stan
```

## License

MIT, see [LICENSE](LICENSE).

## Credits

Created by [Matthieu Beurel](https://www.mbeurel.com). Sponsored by [Yipikai Studio](https://yipikai.studio).
