<?php

namespace Temporal39\Tests\Rounding;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Temporal39\Rounding\RoundingMode;
use Temporal39\Rounding\Sign;
use Temporal39\Rounding\UnsignedRoundingMode;

#[CoversClass( RoundingMode::class )]
class RoundingModeTest extends TestCase {
	#[DataProvider( 'provideNegate' )]
	public function testNegate(
		RoundingMode $roundingMode,
		RoundingMode $expectedNegatedMode,
	): void {
		$this->assertSame( $expectedNegatedMode, $roundingMode->negate() );
	}

	public static function provideNegate(): array {
		return [
			[ RoundingMode::Ceil, RoundingMode::Floor ],
			[ RoundingMode::Floor, RoundingMode::Ceil ],
			[ RoundingMode::HalfCeil, RoundingMode::HalfFloor ],
			[ RoundingMode::HalfFloor, RoundingMode::HalfCeil ],

			[ RoundingMode::Expand, RoundingMode::Expand ],
			[ RoundingMode::Trunc, RoundingMode::Trunc ],
			[ RoundingMode::HalfExpand, RoundingMode::HalfExpand ],
			[ RoundingMode::HalfTrunc, RoundingMode::HalfTrunc ],
			[ RoundingMode::HalfEven, RoundingMode::HalfEven ],
		];
	}

	#[DataProvider( 'provideGetUnsignedRoundingMode' )]
	public function testGetUnsignedRoundingMode(
		RoundingMode $roundingMode,
		Sign $sign,
		UnsignedRoundingMode $expectedUnsignedMode,
	): void {
		$this->assertSame(
			$expectedUnsignedMode,
			$roundingMode->getUnsignedRoundingMode( $sign ),
		);
	}

	public static function provideGetUnsignedRoundingMode(): array {
		return [
			[ RoundingMode::Ceil, Sign::Positive, UnsignedRoundingMode::Infinity ],
			[ RoundingMode::Ceil, Sign::Negative, UnsignedRoundingMode::Zero ],

			[ RoundingMode::Floor, Sign::Positive, UnsignedRoundingMode::Zero ],
			[ RoundingMode::Floor, Sign::Negative, UnsignedRoundingMode::Infinity ],

			[ RoundingMode::Expand, Sign::Positive, UnsignedRoundingMode::Infinity ],
			[ RoundingMode::Expand, Sign::Negative, UnsignedRoundingMode::Infinity ],

			[ RoundingMode::Trunc, Sign::Positive, UnsignedRoundingMode::Zero ],
			[ RoundingMode::Trunc, Sign::Negative, UnsignedRoundingMode::Zero ],

			[ RoundingMode::HalfCeil, Sign::Positive, UnsignedRoundingMode::HalfInfinity ],
			[ RoundingMode::HalfCeil, Sign::Negative, UnsignedRoundingMode::HalfZero ],

			[ RoundingMode::HalfFloor, Sign::Positive, UnsignedRoundingMode::HalfZero ],
			[ RoundingMode::HalfFloor, Sign::Negative, UnsignedRoundingMode::HalfInfinity ],

			[ RoundingMode::HalfExpand, Sign::Positive, UnsignedRoundingMode::HalfInfinity ],
			[ RoundingMode::HalfExpand, Sign::Negative, UnsignedRoundingMode::HalfInfinity ],

			[ RoundingMode::HalfTrunc, Sign::Positive, UnsignedRoundingMode::HalfZero ],
			[ RoundingMode::HalfTrunc, Sign::Negative, UnsignedRoundingMode::HalfZero ],

			[ RoundingMode::HalfEven, Sign::Positive, UnsignedRoundingMode::HalfEven ],
			[ RoundingMode::HalfEven, Sign::Negative, UnsignedRoundingMode::HalfEven ],
		];
	}
}
