<?php

namespace Temporal39\Rounding;

enum UnsignedRoundingMode {
	case Infinity;
	case Zero;
	case HalfInfinity;
	case HalfZero;
	case HalfEven;
}
