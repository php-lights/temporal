<?php

namespace Temporal39\Options;

enum Overflow: string {
	case Constrain = 'constrain';
	case Reject = 'reject';
}
