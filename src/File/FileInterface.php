<?php
/*
 * This file is part of the Austral Contracts package.
 *
 * (c) Austral <support@austral.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Austral\Contracts\File;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Austral\Contracts\Entity\EntityInterface;

/**
 * Austral Entity File Interface.
 * @template T of object
 *
 * @extends EntityInterface<T>
 *
 * @author Matthieu Beurel <matthieu@austral.dev>
 */
interface FileInterface extends EntityInterface
{

  /**
   * @return string
   */
  public function getClassnameForMapping(): string;

  /**
   * @return string
   */
  public function getObjectIdToFile(): string;

  /**
   * @return array<string|int, UploadedFile|null>
   */
  public function getUploadFiles(): array;

  /**
   * @param array<string|int, UploadedFile|null> $uploadFiles
   * @return $this
   */
  public function setUploadFiles(array $uploadFiles = []): self;

  /**
   * @param string $fieldname
   * @param UploadedFile|null $uploadedFile
   *
   * @return $this
   */
  public function setUploadFileByFieldname(string $fieldname, ?UploadedFile $uploadedFile = null): self;

  /**
   * @param string $fieldname
   *
   * @return UploadedFile|null
   */
  public function getUploadFileByFieldname(string $fieldname): ?UploadedFile;

  /**
   * @param string $fieldname
   *
   * @return bool
   */
  public function getDeleteFileByFieldname(string $fieldname): bool;

  /**
   * @param string $fieldname
   * @param mixed $value
   *
   * @return $this
   */
  public function setDeleteFileByFieldname(string $fieldname, mixed $value): self;

  /**
   * @return array<string, mixed>
   */
  public function getDeleteFiles(): array;

  /**
   * @param array<string, mixed> $deleteFiles
   *
   * @return $this
   */
  public function setDeleteFiles(array $deleteFiles): self;

}
