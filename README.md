# Dashboard Module

*anomaly.module.dashboard*

#### A system dashboard and report manager.

The Dashboard Module provides a customizable dashboard interface with widget support and real-time reporting capabilities.

## Features

- Customizable dashboard layouts
- Widget system
- Drag-and-drop widget positioning
- Widget permissions
- Real-time data updates
- Multiple dashboard support
- Responsive design

## Usage

### Creating Widgets

```php
namespace Example\ExampleModule\Widget;

use Anomaly\DashboardModule\Widget\WidgetExtension;

class StatsWidget extends WidgetExtension
{
    protected $view = 'example.module.example::widgets/stats';

    public function data()
    {
        return [
            'total_users' => User::count(),
            'total_posts' => Post::count()
        ];
    }
}
```

### Displaying Dashboard

```twig
{# Display default dashboard #}
{{ dashboard()|raw }}

{# Display specific dashboard #}
{{ dashboard('admin')|raw }}
```

## Requirements

- Streams Platform ^1.10
- PyroCMS 3.10+

## License

The Dashboard Module is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
