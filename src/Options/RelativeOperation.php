<?php

namespace Temporal39\Options;

/**
 * @note Implementation of the operation argument for DifferenceTemporalInstant()
 * @see https://tc39.es/proposal-temporal/#sec-temporal-differencetemporalinstant
 */
enum RelativeOperation {
	case Since;
	case Until;
}
