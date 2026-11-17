<?php
/*
 * This file is part of the Austral Contracts package.
 *
 * (c) Austral <support@austral.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Austral\Contracts\Translate;
use Austral\Contracts\Entity\EntityInterface;

/**
 * Austral Entity Translate Child Interface.
 * @template T of object
 *
 * @extends EntityInterface<T>
 *
 * @author Matthieu Beurel <matthieu@austral.dev>
 */
interface TranslateChildInterface extends EntityInterface
{

  /**
   * Set master
   *
   * @param TranslateMasterInterface<T> $master
   *
   * @return $this
   */
  public function setMaster(TranslateMasterInterface $master): self;

  /**
   * Get master
   * @return TranslateMasterInterface<T>
   */
  public function getMaster(): TranslateMasterInterface;

  /**
   * Get language
   *
   * @return string|null
   */
  public function getLanguage(): ?string;

  /**
   * Set language
   *
   * @param string|null $language
   * @return $this
   */
  public function setLanguage(?string $language): self;

  /**
   * Set isReferent
   *
   * @param bool $isReferent
   *
   * @return $this
   */
  public function setIsReferent(bool $isReferent): self;

  /**
   * Get isReferent
   * @return bool
   */
  public function getIsReferent(): bool;


}
