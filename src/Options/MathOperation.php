<?php

namespace Temporal39\Options;

/**
 * @note Implementation of the operation argument for AddDurationToInstant()
 * @see https://tc39.es/proposal-temporal/#sec-temporal-adddurationtoinstant
 */
enum MathOperation {
	case Add;
	case Subtract;
}
