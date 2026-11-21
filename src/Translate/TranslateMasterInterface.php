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
use Doctrine\Common\Collections\Collection;

/**
 * Austral Entity Translate Master Interface.
 *
 * @template T of object
 *
 * @extends EntityInterface<T>
 *
 * @author Matthieu Beurel <matthieu@austral.dev>
 */
interface TranslateMasterInterface extends EntityInterface
{
  /**
   * @return string
   */
  public function getId(): string;

  /**
   * @return TranslateChildInterface<T>
   */
  public function createNewTranslateByLanguage(): TranslateChildInterface;

  /**
   * Class of the translation entity, known without creating an instance.
   *
   * @return class-string<TranslateChildInterface<T>>
   */
  public function getTranslateClassname(): string;

  /**
   * @param string $name
   *
   * @return mixed
   */
  public function __get(string $name);

  /**
   * @param string $name
   * @param mixed  $value
   *
   * @return void
   */
  public function __set(string $name, mixed $value);

  /**
   * Add translations
   *
   * @param TranslateChildInterface<T> $translate
   *
   * @return $this
   */
  public function addTranslates(TranslateChildInterface $translate): self;

  /**
   * Remove translations
   *
   * @param TranslateChildInterface<T> $translate
   *
   * @return $this
   */
  public function removeTranslates(TranslateChildInterface $translate): self;

  /**
   * Get translations
   *
   * @return Collection<int, TranslateChildInterface<T>>
   */
  public function getTranslates(): Collection;

  /**
   * Remove All translations
   *
   * @return $this
   */
  public function removeAllTranslates(): self;

  /**
   * @return array<int, string>
   */
  public function getLanguages(): array;

  /**
   * @return string|null
   */
  public function getLanguageCurrent(): ?string;

  /**
   * @param string|null $value
   *
   * @return $this
   */
  public function setCurrentLanguage(?string $value): self;

  /**
   * @param TranslateChildInterface<T> $translate
   * @param string                     $fieldKey
   *
   * @return mixed
   */
  public function getTranslateValueByKey(TranslateChildInterface $translate, string $fieldKey): mixed;

  /**
   * @param TranslateChildInterface<T> $translate
   * @param string                     $fieldKey
   * @param mixed                      $value
   *
   * @return $this
   */
  public function setTranslateValueByKey(TranslateChildInterface $translate, string $fieldKey, mixed $value = null): self;

  /**
   * @return array<string, TranslateChildInterface<T>>
   */
  public function getTranslatesByLanguage(): array;

  /**
   * @return TranslateChildInterface<T>|null
   */
  public function getTranslateReferent(): ?TranslateChildInterface;

  /**
   * @param string $langue
   *
   * @return TranslateChildInterface<T>|null
   */
  public function getTranslateByLanguage(string $langue): ?TranslateChildInterface;

  /**
   * @return TranslateChildInterface<T>|null
   */
  public function getTranslateCurrent(): ?TranslateChildInterface;

  /**
   * @param TranslateChildInterface<T> $child
   *
   * @return $this
   */
  public function addTranslateByLanguage(TranslateChildInterface $child): self;
}
