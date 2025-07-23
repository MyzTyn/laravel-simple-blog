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
            'author' => fake()->name(),
            'content' => $this->generateMarkdown(),
            'image_link' => fake()->boolean(50) // 80% chance to have an image
                ? 'https://dummyimage.com/850x350/dee2e6/6c757d.jpg' . urlencode(fake()->word())
                : null,
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
