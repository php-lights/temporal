<?php

namespace Neoncitylights\Temporal\Tests;

use Neoncitylights\Temporal\Temporal;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass( Temporal::class )]
class TemporalTest extends TestCase {
	public function testDefault(): void {
		$this->assertSame( 'Hello World', Temporal::greet() );
	}

	public function testWithArgument(): void {
		$this->assertSame( 'Hello Bob', Temporal::greet( 'Bob' ) );
	}
}
