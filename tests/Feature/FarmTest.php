<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Farm;
use App\Market;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FarmTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function testFarms(): void
    {
        $response = $this->get('/farms');

        $response->assertOk();
    }

    public function testAddFarm(): void
    {
        $farm = Farm::create($this->farmData());

        $this->assertSame($this->farmData()['name'], $farm->name);
        $this->assertDatabaseHas('farms', ['city' => 'Miami']);
    }

    public function testAddMarketToFarm(): void
    {
        $farm = Farm::create($this->farmData());
        $orlandoMarket = Market::create($this->orlandoMarketData());

        $this->assertSame($this->farmData()['name'], $farm->name);
        $this->assertSame($this->orlandoMarketData()['name'], $orlandoMarket->name);
        $this->assertDatabaseHas('markets', ['city' => 'Orlando']);
    }

    public function testLinkMarketToFarm(): void
    {
        $farm = Farm::create($this->farmData());
        $orlandoMarket = Market::create($this->orlandoMarketData());
        $orlandoMarket->farms()->sync($farm);

        $this->assertSame($this->farmData()['name'], $orlandoMarket->farms()->first()->name);
        $this->assertSame($this->orlandoMarketData()['name'], $farm->markets()->first()->name);
        $this->assertDatabaseHas('markets', ['city' => 'Orlando']);
    }

    public function testFarmCanHaveManyMarkets(): void
    {
        $farm = Farm::create($this->farmData());
        $orlandoMarket = Market::create($this->orlandoMarketData());
        $orlandoMarket->farms()->sync($farm);
        $daytonaMarket = Market::create($this->daytonaMarketData());
        $daytonaMarket->farms()->sync($farm);

        $farmHasManyMarkets = $farm->markets()->get();
        $this->assertSame($this->farmData()['name'], $orlandoMarket->farms()->first()->name);
        $this->assertSame($this->orlandoMarketData()['name'], $farmHasManyMarkets[0]->name);
        $this->assertSame($this->daytonaMarketData()['name'], $farmHasManyMarkets[1]->name);
        $this->assertDatabaseHas('markets', ['city' => 'Daytona']);
    }

    public function testWhenFarmMarketHasRelationshipDeletingMarketRemovesRelationship(): void
    {
        $farm = Farm::create($this->farmData());
        $orlandoMarket = Market::create($this->orlandoMarketData());
        $orlandoMarket->farms()->sync($farm);
        $daytonaMarket = Market::create($this->daytonaMarketData());
        $daytonaMarket->farms()->sync($farm);

        $farmHasManyMarkets = $farm->markets()->get();
        $this->assertSame(2, $farmHasManyMarkets->count());
        $this->assertSame($this->farmData()['name'], $orlandoMarket->farms()->first()->name);
        $this->assertSame($this->orlandoMarketData()['name'], $farmHasManyMarkets[0]->name);
        $this->assertSame($this->daytonaMarketData()['name'], $farmHasManyMarkets[1]->name);
        $this->assertDatabaseHas('markets', ['city' => 'Orlando']);

        $orlandoMarket->delete();

        $this->assertDeleted('markets', ['city' => 'Orlando']);

        $newFarmHasManyMarkets = $farm->markets()->get();
        $this->assertSame(1, $newFarmHasManyMarkets->count());
        $this->assertSame($this->daytonaMarketData()['name'], $newFarmHasManyMarkets[0]->name);
    }

    protected function farmData(): array
    {
        return [
            'name' => 'Miami Farm',
            'city' => 'Miami',
            'website' => 'miamifarm.com',
        ];
    }

    protected function orlandoMarketData(): array
    {
        return [
            'name' => 'Orlando Market',
            'city' => 'Orlando',
            'website' => 'orlandoMarket.com',
        ];
    }

    protected function daytonaMarketData(): array
    {
        return [
            'name' => 'Daytona Market',
            'city' => 'Daytona',
            'website' => 'daytonaMarket.com',
        ];
    }
}
