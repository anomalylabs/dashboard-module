---
title: Usage
---

## Usage[](#usage)

This section will show you how to use the addon via API and in the view layer.


### Widgets[](#usage/widgets)

Dashboard widgets are Stream entries that are associated with an `extension`. The extensions along with configuration using the [Configuration module](/documentation/configuration/module).


#### Widget Fields[](#usage/widgets/widget-fields)

Below is a list of `fields` in the `widgets` stream. Fields are accessed as attributes:

    $widget->title;

Same goes for decorated instances in Twig:

    {{ widget.title }}

###### Fields

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Type</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

title

</td>

<td>

text

</td>

<td>

The title.

</td>

</tr>

<tr>

<td>

description

</td>

<td>

textarea

</td>

<td>

The description.

</td>

</tr>

<tr>

<td>

extension

</td>

<td>

addon

</td>

<td>

The widget extension.

</td>

</tr>

<tr>

<td>

column

</td>

<td>

integer

</td>

<td>

The column placement.

</td>

</tr>

<tr>

<td>

pinned

</td>

<td>

boolean

</td>

<td>

The pinned state.

</td>

</tr>

<tr>

<td>

dashboard

</td>

<td>

relationship

</td>

<td>

The related dashboard.

</td>

</tr>

<tr>

<td>

allowed_roles

</td>

<td>

multiple

</td>

<td>

The roles allowed to view the widget.

</td>

</tr>

</tbody>

</table>


#### Widget Interface[](#usage/widgets/widget-interface)

This section will go over the `\Anomaly\DashboardModule\Widget\Contract\WidgetInterface` class.


##### WidgetInterface::output()[](#usage/widgets/widget-interface/widgetinterface-output)

The `output` method returns the complete widget output.

###### Returns: `string`

###### Example

    $widget->output();

###### Twig

    {{ widget.output()|raw }}


##### WidgetInterface::addData()[](#usage/widgets/widget-interface/widgetinterface-adddata)

The `addData` method adds data to the widget's data for access later in processing and output.

###### Returns: `\Anomaly\Streams\Platform\Entry\Contract\EntryInterface`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$key

</td>

<td>

true

</td>

<td>

string

</td>

<td>

none

</td>

<td>

The data key.

</td>

</tr>

<tr>

<td>

$data

</td>

<td>

true

</td>

<td>

mixed

</td>

<td>

none

</td>

<td>

The data.

</td>

</tr>

</tbody>

</table>

###### Example

    $widget->addData('example', 'http://pyrocms.com');


##### WidgetInterface::getData()[](#usage/widgets/widget-interface/widgetinterface-getdata)

The `getData` method returns the widget's data collection.

###### Returns: `\Anomaly\DashboardModule\Widget\WidgetData`

###### Example

    $widget->getData()->get('example');

###### Twig

    {{ widget.getData().get('example') }}


##### WidgetInterface::setContent()[](#usage/widgets/widget-interface/widgetinterface-setcontent)

The `setContent` method sets the interior content for the widget wrapper view.

###### Returns: `\Anomaly\DashboardModule\Widget\Contract\WidgetInterface`

###### Arguments

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

$content

</td>

<td>

true

</td>

<td>

string

</td>

<td>

none

</td>

<td>

The rendered content.

</td>

</tr>

</tbody>

</table>

###### Example

    $widget->setContent($html);


##### WidgetInterface::getContent()[](#usage/widgets/widget-interface/widgetinterface-getcontent)

The `getContent` method gets the interior content for the widget wrapper view.

###### Returns: `string`

###### Example

    $widget->getContent();

###### Twig

    {{ widget.getContent()|raw }}


### Dashboards[](#usage/dashboards)

Dashboards are stream entries that have multiple widgets associated with it.


#### Dashboard Fields[](#usage/dashboards/dashboard-fields)

Below is a list of `fields` in the `dashboards` stream. Fields are accessed as attributes:

    $dashboard->name;

Same goes for decorated instances in Twig:

    {{ dashboard.name }}

###### Fields

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Type</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

name

</td>

<td>

text

</td>

<td>

The dashboard name.

</td>

</tr>

<tr>

<td>

slug

</td>

<td>

slug

</td>

<td>

The dashboard slug.

</td>

</tr>

<tr>

<td>

description

</td>

<td>

textarea

</td>

<td>

The dashboard description.

</td>

</tr>

<tr>

<td>

name

</td>

<td>

text

</td>

<td>

The dashboard name.

</td>

</tr>

<tr>

<td>

layout

</td>

<td>

select

</td>

<td>

The dashboard column layout.

</td>

</tr>

<tr>

<td>

allowed_roles

</td>

<td>

multiple

</td>

<td>

The roles allowed to view the dashboard.

</td>

</tr>

</tbody>

</table>


#### Dashboard Interface[](#usage/dashboards/dashboard-interface)

This section will go over the `\Anomaly\DashboardModule\Dashboard\Contract\DashboardInterface` class.


##### DashboardInterface::getWidgets()[](#usage/dashboards/dashboard-interface/dashboardinterface-getwidgets)

The `getWidgets` method returns the related widgets.

###### Returns: `\Anomaly\DashboardModule\Widget\WidgetCollection`

###### Example

    foreach ($dashboard->getWidgets() as $widget) {
        echo $widget->title . '<br>';
    }

###### Twig

    {% for widget in dashboard.getWidgets() %}
        {{ widget.title }}
    {% endfor %}


##### DashboardInterface::widgets()[](#usage/dashboards/dashboard-interface/dashboardinterface-widgets)

The `widgets` method returns the widget relation.

###### Returns: `\Illuminate\Database\Eloquent\Relations\HasMany`

###### Example

    $widgets = $dashboard->widgets()->where('extension', 'anomaly.extension.xml_feed_widget')->get();

###### Twig

    {% set widgets = dashboard.widgets().where('extension', 'anomaly.extension.xml_feed_widget').get() %}
