<?php
/*
 * This file is part of the Austral Contracts package.
 *
 * (c) Austral <support@austral.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Austral\Contracts\Entity;

/**
 * Austral Interface Entity.
 * @template T of object
 *
 * @author Matthieu Beurel <matthieu@austral.dev>
 */
interface EntityInterface
{

  /**
   * @return string
   */
  public function __toString();

  /**
   * @return string
   */
  public function getId(): string;

  /**
   * @param string $id
   *
   * @return $this
   */
  public function setId(string $id): self;

  /**
   * @return bool
   */
  public function getIsCreate(): bool;

  /**
   * @param bool $isCreate
   *
   * @return $this
   */
  public function setIsCreate(bool $isCreate): self;

  /**
   * @return array<string, mixed>
   */
  public function arrayObject(): array;

  /**
   * @return string
   */
  public function json(): string;

  /**
   * @return string
   */
  public function serialize(): string;

  /**
   * @return string
   */
  public function getClassname(): string;

  /**
   * @return string
   */
  public function getClassnameForMapping(): string;

  /**
   * @return string
   */
  public function getSnakeClassname(): string;

  /**
   * @return string
   */
  public function getSluggerClassname(): string;

  /**
   * @return string
   */
  public function getEntityName(): string;

  /**
   * @param array<string, mixed> $values
   *
   * @return $this
   */
  public function hydrate(array $values = []): self;

  /**
   * @param string $fieldname
   *
   * @return mixed
   * @throws \Exception
   */
  public function getValueByFieldname(string $fieldname): mixed;

  /**
   * @param string $fieldname
   * @param mixed $value
   *
   * @return $this
   * @throws \Exception
   */
  public function setValueByFieldname(string $fieldname, mixed $value = null): self;


}
