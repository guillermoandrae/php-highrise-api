<?php

namespace GuillermoandraeTest\Highrise\Repositories;

use GuillermoandraeTest\Highrise\TestCase;

class TasksTest extends TestCase
{
    public function testFindAll()
    {
        $body = '<tasks type="array"><task><id>1</id></task><task><id>2</id></task></tasks>';
        $repository = $this->getMockRepository('tasks', $body);
        $resource->findAll();
        $this->assertSameLastRequestUri('/tasks/all.xml', $resource);
    }

    public function testFindBy()
    {
        $body = '<tasks type="array"><task><id>1</id></task><task><id>2</id></task></tasks>';
        $repository = $this->getMockRepository('tasks', $body);
        $resource->findBy('people', 3);
        $this->assertSameLastRequestUri('/people/3/tasks.xml', $resource);
    }

    public function testFindUpcoming()
    {
        $body = '<tasks type="array"><task><id>1</id></task><task><id>2</id></task></tasks>';
        $repository = $this->getMockRepository('tasks', $body);
        $resource->findUpcoming();
        $this->assertSameLastRequestUri('/tasks/upcoming.xml', $resource);
    }

    public function testFindAssigned()
    {
        $body = '<tasks type="array"><task><id>1</id></task><task><id>2</id></task></tasks>';
        $repository = $this->getMockRepository('tasks', $body);
        $resource->findAssigned();
        $this->assertSameLastRequestUri('/tasks/assigned.xml', $resource);
    }

    public function testFindCompleted()
    {
        $body = '<tasks type="array"><task><id>1</id></task><task><id>2</id></task></tasks>';
        $repository = $this->getMockRepository('tasks', $body);
        $resource->findCompleted();
        $this->assertSameLastRequestUri('/tasks/completed.xml', $resource);
    }

    public function testFindToday()
    {
        $body = '<tasks type="array"><task><id>1</id></task><task><id>2</id></task></tasks>';
        $repository = $this->getMockRepository('tasks', $body);
        $resource->findToday();
        $this->assertSameLastRequestUri('/tasks/today.xml', $resource);
    }
}
