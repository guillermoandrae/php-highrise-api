<?php

namespace GuillermoandraeTest\Highrise\Repositories;

use GuillermoandraeTest\Highrise\TestCase;

class TasksTest extends TestCase
{
    public function testFindAll()
    {
        $body = $this->getMockModelsXml('task');
        $repository = $this->getMockRepository('tasks', $body);
        $repository->findAll();
        $this->assertSameLastRequestUri('/tasks/all.xml', $repository);
    }

    public function testFindBy()
    {
        $body = $this->getMockModelsXml('task');
        $repository = $this->getMockRepository('tasks', $body);
        $repository->findBy('people', 3);
        $this->assertSameLastRequestUri('/people/3/tasks.xml', $repository);
    }

    public function testFindUpcoming()
    {
        $body = $this->getMockModelsXml('task');
        $repository = $this->getMockRepository('tasks', $body);
        $repository->findUpcoming();
        $this->assertSameLastRequestUri('/tasks/upcoming.xml', $repository);
    }

    public function testFindAssigned()
    {
        $body = $this->getMockModelsXml('task');
        $repository = $this->getMockRepository('tasks', $body);
        $repository->findAssigned();
        $this->assertSameLastRequestUri('/tasks/assigned.xml', $repository);
    }

    public function testFindCompleted()
    {
        $body = $this->getMockModelsXml('task');
        $repository = $this->getMockRepository('tasks', $body);
        $repository->findCompleted();
        $this->assertSameLastRequestUri('/tasks/completed.xml', $repository);
    }

    public function testFindToday()
    {
        $body = '<tasks type="array"><task><id>1</id></task><task><id>2</id></task></tasks>';
        $repository = $this->getMockRepository('tasks', $body);
        $repository->findToday();
        $this->assertSameLastRequestUri('/tasks/today.xml', $repository);
    }
}
