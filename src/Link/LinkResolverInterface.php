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
 * Resolves an internal link (an entity of the application) into a public URL.
 *
 * Implemented by seo-bundle. Bundles that render links (content-block, email…)
 * depend on this interface only: without an implementation, internal links are
 * simply not resolved and only external links are available.
 *
 * @author Matthieu Beurel <matthieu@austral.dev>
 */
interface LinkResolverInterface
{
  /**
   * @param string $entityClass Classname (or mapping key) of the linked entity
   * @param string $id          Identifier of the linked entity
   *
   * @return ResolvedLink|null null when the entity has no public URL
   */
  public function resolve(string $entityClass, string $id): ?ResolvedLink;
}
