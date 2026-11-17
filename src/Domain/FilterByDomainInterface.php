<?php
/*
 * This file is part of the Austral Contracts package.
 *
 * (c) Austral <support@austral.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Austral\Contracts\Domain;

use Austral\Contracts\Entity\EntityInterface;

/**
 * Entity attached to a domain (multi-domain websites).
 * @template T of object
 *
 * @extends EntityInterface<T>
 *
 * @author Matthieu Beurel <matthieu@austral.dev>
 */
interface FilterByDomainInterface extends EntityInterface
{

  /**
   * Identifier of the master domain, used when an entity is shared by all domains.
   */
  public const DOMAIN_ID_MASTER = "master";

  /**
   * @return string|null
   */
  public function getDomainId(): ?string;

  /**
   * @param string|null $domainId
   *
   * @return $this
   */
  public function setDomainId(?string $domainId = self::DOMAIN_ID_MASTER): self;

}
