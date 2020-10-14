<?php

use App\Utils\ObjectArrays;
use Codeception\Util\HttpCode;

class DeliveryControllerCest
{
    public function testInvalidDomain(\FunctionalTester $I)
    {
        $I->sendAjaxGetRequest('delivery/check', [
            'search' => 'err*-;ror'
        ]);
        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }

    public function testExisting(\FunctionalTester $I)
    {
        $I->sendAjaxGetRequest('delivery/check', [
            'search' => 'almaty'
        ]);
        $I->seeResponseCodeIs(HttpCode::OK);
        $dtos = $I->grabJsonResponse();

        // compare values
        $I->assertCount(3, $dtos);

        $I->assertNotNull(ObjectArrays::filterEqualOne($dtos, 'type', 'pickup'));
        $I->assertNotNull(ObjectArrays::filterEqualOne($dtos, 'type', 'courier'));
        $I->assertNotNull(ObjectArrays::filterEqualOne($dtos, 'type', 'post'));

        $I->assertFalse(ObjectArrays::filterEqualOne($dtos, 'type', 'post')->available);
        $I->assertTrue(ObjectArrays::filterEqualOne($dtos, 'type', 'pickup')->available);
        $I->assertTrue(ObjectArrays::filterEqualOne($dtos, 'type', 'courier')->available);
    }

    public function testNewDomain(\FunctionalTester $I)
    {
        $I->sendAjaxGetRequest('delivery/check', [
            'search' => 'nur-sultan'
        ]);
        $I->seeResponseCodeIs(HttpCode::OK);
        $dtos = $I->grabJsonResponse();

        // compare values
        $I->assertCount(3, $dtos);

        $I->assertNotNull(ObjectArrays::filterEqualOne($dtos, 'type', 'pickup'));
        $I->assertNotNull(ObjectArrays::filterEqualOne($dtos, 'type', 'courier'));
        $I->assertNotNull(ObjectArrays::filterEqualOne($dtos, 'type', 'post'));

        $I->assertTrue(ObjectArrays::filterEqualOne($dtos, 'type', 'pickup')->available);
        $I->assertTrue(ObjectArrays::filterEqualOne($dtos, 'type', 'courier')->available);
        $I->assertTrue(ObjectArrays::filterEqualOne($dtos, 'type', 'post')->available);

        $I->assertEquals(0.00, ObjectArrays::filterEqualOne($dtos, 'type', 'pickup')->price);
        $I->assertEquals(9.99, ObjectArrays::filterEqualOne($dtos, 'type', 'courier')->price);
        $I->assertEquals(15.99, ObjectArrays::filterEqualOne($dtos, 'type', 'post')->price);
    }
}
