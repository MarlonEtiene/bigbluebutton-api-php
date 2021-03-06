<?php
/**
 * BigBlueButton open source conferencing system - http://www.bigbluebutton.org/.
 *
 * Copyright (c) 2016 BigBlueButton Inc. and by respective authors (see below).
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free Software
 * Foundation; either version 3.0 of the License, or (at your option) any later
 * version.
 *
 * BigBlueButton is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with BigBlueButton; if not, see <http://www.gnu.org/licenses/>.
 */
namespace BigBlueButton\Parameters;

use BigBlueButton\TestCase as TestCase;

class JoinMeetingParametersTest extends TestCase
{
    public function testJoinMeetingParameters()
    {
        $params              = $this->generateJoinMeetingParams();
        $joinMeetingParams   = $this->getJoinMeetingMock($params);

        $this->assertEquals($params['meetingId'], $joinMeetingParams->getMeetingId());
        $this->assertEquals($params['userName'], $joinMeetingParams->getUsername());
        $this->assertEquals($params['password'], $joinMeetingParams->getPassword());
        $this->assertEquals($params['userId'], $joinMeetingParams->getUserId());
        $this->assertEquals($params['webVoiceConf'], $joinMeetingParams->getWebVoiceConf());
        $this->assertEquals($params['creationTime'], $joinMeetingParams->getCreationTime());

        // Test setters that are ignored by the constructor
        $newId       = $this->faker->uuid;
        $newName     = $this->faker->name;
        $newPassword = $this->faker->password;
        $joinMeetingParams->setMeetingId($newId);
        $joinMeetingParams->setUsername($newName);
        $joinMeetingParams->setPassword($newPassword);
        $this->assertEquals($newId, $joinMeetingParams->getMeetingId());
        $this->assertEquals($newName, $joinMeetingParams->getUsername());
        $this->assertEquals($newPassword, $joinMeetingParams->getPassword());
    }
}
