<?php

namespace Temporal39\Options;

enum ShowTimeZoneName: string {
	case Auto = 'auto';
	case Never = 'never';
	case Critical = 'critical';
}
