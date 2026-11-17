# Changelog

All notable changes to this package are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html). All Austral bundles share the same major and minor version.

## [Unreleased]

### Added

First version of `austral/contracts`, the layer 0 package of Austral V4.

- `Entity\EntityInterface` (from entity-bundle `Austral\EntityBundle\Entity\EntityInterface`)
- `Translate\TranslateMasterInterface`, `Translate\TranslateChildInterface` (from entity-translate-bundle)
- `File\FileInterface` (from entity-file-bundle)
- `Domain\FilterByDomainInterface` (from http-bundle), with the `DOMAIN_ID_MASTER` constant
- `Link\LinkResolverInterface` and `Link\ResolvedLink`: internal link resolution, implemented by seo-bundle
- `Enum\PublicationStatus`: `published`, `unpublished`, `draft`

### Changed

### Fixed

### Removed

[Unreleased]: https://github.com/austral-project/contracts/commits/4.x
