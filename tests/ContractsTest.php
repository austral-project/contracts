<?php

/*
 * This file is part of the Austral Contracts package.
 *
 * (c) Austral <support@austral.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Austral\Contracts\Tests;

use Austral\Contracts\Domain\FilterByDomainInterface;
use Austral\Contracts\Enum\PublicationStatus;
use Austral\Contracts\Link\ResolvedLink;
use PHPUnit\Framework\TestCase;

/**
 * Austral Contracts Test.
 *
 * @author Matthieu Beurel <matthieu@austral.dev>
 */
final class ContractsTest extends TestCase
{
  /**
   * Every file in src/ must declare the class/interface/enum matching its PSR-4 path.
   */
  public function testEverySourceFileIsAutoloadable(): void
  {
    $srcDir = \dirname(__DIR__).'/src';
    $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($srcDir, \FilesystemIterator::SKIP_DOTS));
    $count = 0;
    /** @var \SplFileInfo $file */
    foreach ($iterator as $file)
    {
      if ('php' !== $file->getExtension())
      {
        continue;
      }
      $relative = substr($file->getPathname(), \strlen($srcDir) + 1, -4);
      $symbol = 'Austral\\Contracts\\'.str_replace('/', '\\', $relative);
      $this->assertTrue(
        class_exists($symbol) || interface_exists($symbol) || enum_exists($symbol) || trait_exists($symbol),
        "{$symbol} is not autoloadable"
      );
      ++$count;
    }
    $this->assertGreaterThan(0, $count);
  }

  /**
   * The contracts package must not depend on any Austral bundle.
   */
  public function testNoDependencyOnAustralBundles(): void
  {
    $srcDir = \dirname(__DIR__).'/src';
    $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($srcDir, \FilesystemIterator::SKIP_DOTS));
    /** @var \SplFileInfo $file */
    foreach ($iterator as $file)
    {
      $content = (string) file_get_contents($file->getPathname());
      $this->assertDoesNotMatchRegularExpression('/Austral\\\\[A-Za-z]+Bundle\\\\/', $content, "{$file->getFilename()} references an Austral bundle");
      $this->assertStringNotContainsString('App\\', $content, "{$file->getFilename()} references the application namespace");
    }
  }

  public function testPublicationStatusKeepsDatabaseValues(): void
  {
    $this->assertSame(['published', 'unpublished', 'draft'], array_map(fn (PublicationStatus $status) => $status->value, PublicationStatus::cases()));
    $this->assertTrue(PublicationStatus::from('published')->isPublished());
    $this->assertFalse(PublicationStatus::Draft->isPublished());
  }

  public function testDomainMasterIdentifier(): void
  {
    $this->assertSame('master', FilterByDomainInterface::DOMAIN_ID_MASTER);
  }

  public function testResolvedLink(): void
  {
    $object = new \stdClass();
    $link = new ResolvedLink(url: '/fr/contact', label: 'Contact', object: $object);
    $this->assertSame('/fr/contact', $link->url);
    $this->assertSame('Contact', $link->label);
    $this->assertSame($object, $link->object);
    $this->assertNull($link->source);
  }
}
