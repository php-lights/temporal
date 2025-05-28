<?php

namespace Temporal39\Options;

enum ShowCalendarName: string {
	case Auto = 'auto';
	case Always = 'always';
	case Never = 'never';
	case Critical = 'critical';
}
