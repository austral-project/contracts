<?php

/*
 * This file is part of the Austral Contracts package.
 *
 * (c) Austral <support@austral.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Austral\Contracts\Link;

/**
 * Result of LinkResolverInterface::resolve().
 *
 * @author Matthieu Beurel <matthieu@austral.dev>
 */
final readonly class ResolvedLink
{
  /**
   * @param string|null $url    Public URL of the linked entity
   * @param string|null $label  Default label (usually the entity name)
   * @param object|null $object The linked entity
   * @param object|null $source The object provided by the resolver (e.g. the seo UrlParameter), for templates
   */
  public function __construct(
    public ?string $url = null,
    public ?string $label = null,
    public ?object $object = null,
    public ?object $source = null,
  ) {
  }
}
