<?php

namespace Temporal39\Rounding;

use Wikimedia\Assert\Assert;
use Wikimedia\Assert\InvariantException;

/**
 * @internal
 */
final readonly class Rounding {
	/**
	 * @note Implementation of ApplyUnsignedRoundingMode()
	 * @see https://tc39.es/proposal-temporal/#sec-applyunsignedroundingmode
	 * @throws InvariantException todo: explain when this might happen
	 */
	public static function applyUnsignedRoundingMode(
		float $x,
		float $r1,
		float $r2,
		?UnsignedRoundingMode $unsignedRoundingMode,
	): float {
		if ( $x === $r1 ) { // todo: float equality
			return $r1;
		}

		Assert::invariant( $r1 < $x && $x < $r2, '' ); // todo: description message
		Assert::invariant( $unsignedRoundingMode !== null, '' ); // todo: description message

		if ( $unsignedRoundingMode === UnsignedRoundingMode::Zero ) {
			return $r1;
		}
		if ( $unsignedRoundingMode === UnsignedRoundingMode::Infinity ) {
			return $r2;
		}

		$d1 = $x - $r1;
		$d2 = $r2 - $x;
		if ( $d1 < $d2 ) {
			return $r1;
		}
		if ( $d2 < $d1 ) {
			return $r2;
		}

		Assert::invariant(
			$d1 === $d2,
			"d1 does not equal d2.\nd1= {$d1}\nd2 = {$d2}" );
		if ( $unsignedRoundingMode === UnsignedRoundingMode::HalfZero ) {
			return $r1;
		}
		if ( $unsignedRoundingMode === UnsignedRoundingMode::HalfInfinity ) {
			return $r2;
		}

		Assert::invariant(
			$unsignedRoundingMode === UnsignedRoundingMode::HalfEven,
			'Unsigned rounding mode is not half-even' );
		$cardinality = ( $r1 / ( $r2 - $r1 ) ) % 2;
		if ( $cardinality === 0 ) {
			return $r1;
		}

		return $r2;
	}

	/**
	 * @note Implementation of RoundNumberToIncrement()
	 * @see https://tc39.es/proposal-temporal/#sec-temporal-roundnumbertoincrement
	 * @throws InvariantException todo: explain when this might happen
	 */
	public static function roundToIncrement(
		float $x,
		int $increment,
		RoundingMode $roundingMode
	): int {
		$quotient = $x / $increment;
		$isNegative = Sign::Positive;

		if ( $quotient < 0 ) {
			$isNegative = Sign::Negative;
			$quotient = -$quotient;
		}

		$unsignedRoundingMode = $roundingMode->getUnsignedRoundingMode( $isNegative );
		$r1 = $quotient;
		$r2 = $quotient + 1;
		$rounded = self::applyUnsignedRoundingMode( $quotient, $r1, $r2, $unsignedRoundingMode );

		if ( $isNegative === Sign::Negative ) {
			$rounded = -$rounded;
		}

		return $rounded * $increment;
	}

	/**
	 * @note Implementation of RoundNumberToIncrementAsIfPositive()
	 * @see https://tc39.es/proposal-temporal/#sec-temporal-roundnumbertoincrementasifpositive
	 * @throws InvariantException todo: explain when this might happen
	 */
	public static function roundToIncrementAsIfPositive(
		float $x,
		int $increment,
		RoundingMode $roundingMode
	): int {
		$quotient = $x / $increment;
		$unsignedRoundingMode = $roundingMode->getUnsignedRoundingMode( Sign::Positive );

		$r1 = $quotient;
		$r2 = $quotient + 1;
		$rounded = self::applyUnsignedRoundingMode( $quotient, $r1, $r2, $unsignedRoundingMode );

		return $rounded * $increment;
	}
}
