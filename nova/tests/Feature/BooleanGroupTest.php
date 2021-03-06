<?php

namespace Laravel\Nova\Tests\Feature;

use Illuminate\Testing\Assert;
use Laravel\Nova\Fields\BooleanGroup;
use Laravel\Nova\Tests\IntegrationTestCase;

class BooleanGroupTest extends IntegrationTestCase
{
    public function test_by_default_the_field_is_displayed_with_the_name_as_the_label()
    {
        $field = BooleanGroup::make('Sizes')->options([
            'create',
            'delete',
        ]);

        $this->assertEquals([
            ['name' => 'create', 'label' => 'create'],
            ['name' => 'delete', 'label' => 'delete'],
        ], $field->jsonSerialize()['options']);
    }

    public function test_the_field_is_displayed_with_friendly_labels()
    {
        $field = BooleanGroup::make('Sizes')->options([
            'create' => 'Create',
            'delete' => 'Delete',
        ]);

        $this->assertEquals([
            ['name' => 'create', 'label' => 'Create'],
            ['name' => 'delete', 'label' => 'Delete'],
        ], $field->jsonSerialize()['options']);
    }

    public function test_the_field_can_accept_closures_as_options()
    {
        $field = BooleanGroup::make('Sizes')->options(function () {
            return [
                'create' => 'Create',
                'delete' => 'Delete',
            ];
        });

        $this->assertEquals([
            ['name' => 'create', 'label' => 'Create'],
            ['name' => 'delete', 'label' => 'Delete'],
        ], $field->jsonSerialize()['options']);
    }

    public function test_the_field_can_accept_collections_as_options()
    {
        $field = BooleanGroup::make('Sizes')->options(collect([
            (object) ['id' => 1, 'name' => 'create', 'label' => 'Create'],
            (object) ['id' => 2, 'name' => 'delete', 'label' => 'Delete'],
        ])->pluck('label', 'name'));

        $this->assertEquals([
            ['name' => 'create', 'label' => 'Create'],
            ['name' => 'delete', 'label' => 'Delete'],
        ], $field->jsonSerialize()['options']);
    }

    public function test_the_field_can_hide_true_values()
    {
        $field = BooleanGroup::make('Sizes')->options([
            'create',
            'delete',
        ])->hideTrueValues();

        Assert::assertArraySubset([
            'hideTrueValues' => true,
        ], $field->jsonSerialize());
    }

    public function test_the_field_can_hide_false_values_from_index()
    {
        $field = BooleanGroup::make('Sizes')->options([
            'create',
            'delete',
        ])->hideFalseValues();

        $this->assertTrue($field->jsonSerialize()['hideFalseValues']);

        Assert::assertArraySubset([
            'hideFalseValues' => true,
        ], $field->jsonSerialize());
    }

    public function test_the_field_can_change_no_data_text()
    {
        $field = BooleanGroup::make('Sizes')->options([
            'create' => 'Create',
            'delete' => 'Delete',
        ])->noValueText('Custom No Data');

        Assert::assertArraySubset([
            'noValueText' => 'Custom No Data',
        ], $field->jsonSerialize());
    }
}
