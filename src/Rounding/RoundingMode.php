<?php

namespace Temporal39\Rounding;

enum RoundingMode: string {
	case Ceil = 'ceil';
	case Floor = 'floor';
	case Expand = 'expand';
	case Trunc = 'trunc';
	case HalfCeil = 'halfCeil';
	case HalfFloor = 'halfFloor';
	case HalfExpand = 'halfExpand';
	case HalfTrunc = 'halfTrunc';
	case HalfEven = 'halfEven';

	public function negate(): self {
		return match ( $this ) {
			self::Ceil => self::Floor,
			self::Floor => self::Ceil,
			self::HalfFloor => self::HalfCeil,
			self::HalfCeil => self::HalfFloor,
			default => $this,
		};
	}

	public function getUnsignedRoundingMode( Sign $sign ): UnsignedRoundingMode {
		return match ( [ $this, $sign ] ) {
			[ self::Ceil, Sign::Positive ] => UnsignedRoundingMode::Infinity,
			[ self::Ceil, Sign::Negative ] => UnsignedRoundingMode::Zero,

			[ self::Floor, Sign::Positive ] => UnsignedRoundingMode::Zero,
			[ self::Floor, Sign::Negative ] => UnsignedRoundingMode::Infinity,

			[ self::Expand, Sign::Positive ] => UnsignedRoundingMode::Infinity,
			[ self::Expand, Sign::Negative ] => UnsignedRoundingMode::Infinity,

			[ self::Trunc, Sign::Positive ] => UnsignedRoundingMode::Zero,
			[ self::Trunc, Sign::Negative ] => UnsignedRoundingMode::Zero,

			[ self::HalfCeil, Sign::Positive ] => UnsignedRoundingMode::HalfInfinity,
			[ self::HalfCeil, Sign::Negative ] => UnsignedRoundingMode::HalfZero,

			[ self::HalfFloor, Sign::Positive ] => UnsignedRoundingMode::HalfZero,
			[ self::HalfFloor, Sign::Negative ] => UnsignedRoundingMode::HalfInfinity,

			[ self::HalfExpand, Sign::Positive ] => UnsignedRoundingMode::HalfInfinity,
			[ self::HalfExpand, Sign::Negative ] => UnsignedRoundingMode::HalfInfinity,

			[ self::HalfTrunc, Sign::Positive ] => UnsignedRoundingMode::HalfZero,
			[ self::HalfTrunc, Sign::Negative ] => UnsignedRoundingMode::HalfZero,

			[ self::HalfEven, Sign::Positive ] => UnsignedRoundingMode::HalfEven,
			[ self::HalfEven, Sign::Negative ] => UnsignedRoundingMode::HalfEven,
		};
	}
}
