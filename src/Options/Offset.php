<?php

namespace Temporal39\Options;

enum Offset: string {
	case Prefer = 'prefer';
	case Use = 'use';
	case Ignore = 'ignore';
	case Reject = 'reject';
}
