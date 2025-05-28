<?php

namespace Temporal39\Options;

enum Disambiguation: string {
	case Compatible = 'compatible';
	case Earlier = 'earlier';
	case Later = 'later';
	case Reject = 'reject';
}
