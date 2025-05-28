<?php

namespace Temporal39\Rounding;

enum Sign: int {
	case Negative = -1;
	case Positive = 1;

	public static function tryFromSignOrZero( SignOrZero $signOrZero ): ?self {
		return match ( $signOrZero ) {
			SignOrZero::Positive => self::Positive,
			SignOrZero::Negative => self::Negative,
			SignOrZero::Zero => null,
		};
	}
}
