<?php
/*
 * This file is part of the Austral Contracts package.
 *
 * (c) Austral <support@austral.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Austral\Contracts\Enum;

/**
 * Publication status of a page or an object.
 * Values match the 3.1 constants (UrlParameterInterface::STATUS_*) stored in database.
 *
 * @author Matthieu Beurel <matthieu@austral.dev>
 */
enum PublicationStatus: string
{
  case Published = "published";
  case Unpublished = "unpublished";
  case Draft = "draft";

  public function isPublished(): bool
  {
    return $this === self::Published;
  }

}
