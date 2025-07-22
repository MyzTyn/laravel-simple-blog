<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogEntry>
 */
class BlogEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'content' => $this->generateMarkdown(),
        ];
    }

    private function generateMarkdown(): string
    {
        return implode("\n\n", [
            '# ' . fake()->sentence(),

            fake()->paragraph(),

            '## ' . fake()->sentence(),

            '- ' . fake()->sentence(),
            '- ' . fake()->sentence(),
            '- ' . fake()->sentence(),

            '### ' . fake()->sentence(),

            fake()->paragraph(),
            '**' . fake()->word() . '** is very important. Also, *' . fake()->word() . '* is useful.',

            '[Learn more](https://example.com)',
        ]);
    }
}
