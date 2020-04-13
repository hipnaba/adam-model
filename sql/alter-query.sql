ALTER TABLE corporation DROP FOREIGN KEY FK_842A5683BF396750;
ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034BF396750;
ALTER TABLE celestial_stargate DROP FOREIGN KEY FK_4F387BFDBF396750;
ALTER TABLE celestial_planet DROP FOREIGN KEY FK_C8B2D185BF396750;
ALTER TABLE celestial_system DROP FOREIGN KEY FK_69ECAAABBF396750;
ALTER TABLE character_faction DROP FOREIGN KEY FK_EAA10BAD76B67878;
ALTER TABLE celestial DROP FOREIGN KEY FK_2A089586BF396750;
ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034B2685369;
ALTER TABLE celestial_moon DROP FOREIGN KEY FK_6B89FEC7BF396750;
ALTER TABLE station DROP FOREIGN KEY FK_9F39F8B1BF396750;
ALTER TABLE character_player DROP FOREIGN KEY FK_3B5BB9F6BF396750;
ALTER TABLE character_faction DROP FOREIGN KEY FK_EAA10BADD0952FA5;
ALTER TABLE celestial_asteroid_belt DROP FOREIGN KEY FK_E8E96FF8BF396750;
ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E64D218E;
ALTER TABLE agent DROP FOREIGN KEY FK_268B9C9DBF396750;
ALTER TABLE celestial_constellation DROP FOREIGN KEY FK_FC982DFBF396750;
ALTER TABLE character_bloodline DROP FOREIGN KEY FK_8C3691A7B2685369;
ALTER TABLE character_faction DROP FOREIGN KEY FK_EAA10BADBF396750;
ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034BF396750;
ALTER TABLE celestial_planet DROP FOREIGN KEY FK_C8B2D185BF396750;
ALTER TABLE celestial_region DROP FOREIGN KEY FK_AFC34A56BF396750;
ALTER TABLE celestial_asteroid_belt DROP FOREIGN KEY FK_E8E96FF8BF396750;
ALTER TABLE celestial_star DROP FOREIGN KEY FK_41BEE33BBF396750;
ALTER TABLE character_faction DROP FOREIGN KEY FK_EAA10BADB2685369;
ALTER TABLE celestial DROP FOREIGN KEY FK_2A089586BF396750;
ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034B2685369;
ALTER TABLE celestial_moon DROP FOREIGN KEY FK_6B89FEC7BF396750;
ALTER TABLE corporation DROP FOREIGN KEY FK_842A5683BF396750;
ALTER TABLE celestial_stargate DROP FOREIGN KEY FK_4F387BFDBF396750;
ALTER TABLE character_faction DROP FOREIGN KEY FK_EAA10BADD0952FA5;
ALTER TABLE character_faction DROP FOREIGN KEY FK_EAA10BAD76B67878;
ALTER TABLE character_character DROP FOREIGN KEY FK_142A120F64D218E;
ALTER TABLE agent DROP FOREIGN KEY FK_268B9C9DBF396750;
ALTER TABLE celestial_region DROP FOREIGN KEY FK_AFC34A56BF396750;
ALTER TABLE celestial_constellation DROP FOREIGN KEY FK_FC982DFBF396750;
ALTER TABLE station DROP FOREIGN KEY FK_9F39F8B1BF396750;
ALTER TABLE character_faction DROP FOREIGN KEY FK_EAA10BADBF396750;
ALTER TABLE celestial_system DROP FOREIGN KEY FK_69ECAAABBF396750;
ALTER TABLE character_player DROP FOREIGN KEY FK_3B5BB9F6BF396750;
ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E64D218E;
ALTER TABLE celestial_star DROP FOREIGN KEY FK_41BEE33BBF396750;
ALTER TABLE character_faction DROP FOREIGN KEY FK_EAA10BADB2685369;
ALTER TABLE character_bloodline DROP FOREIGN KEY FK_8C3691A7B2685369;
ALTER TABLE `corporation` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `character` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `celestial_stargate` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `celestial_planet` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `celestial_system` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `character_faction` CHANGE `militia_corporation_id` `militia_corporation_id` bigint unsigned;
ALTER TABLE `celestial` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `character` CHANGE `corporation_id` `corporation_id` bigint unsigned;
ALTER TABLE `celestial_moon` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `station` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `character_player` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `character_faction` CHANGE `system_id` `system_id` bigint unsigned;
ALTER TABLE `celestial_asteroid_belt` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `item` CHANGE `location_id` `location_id` bigint unsigned;
ALTER TABLE `agent` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `celestial_constellation` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `character_bloodline` CHANGE `corporation_id` `corporation_id` bigint unsigned;
ALTER TABLE `character_faction` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `character` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `celestial_planet` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `celestial_region` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `celestial_asteroid_belt` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `celestial_star` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `character_faction` CHANGE `corporation_id` `corporation_id` bigint unsigned;
ALTER TABLE `celestial` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `character` CHANGE `corporation_id` `corporation_id` bigint unsigned;
ALTER TABLE `celestial_moon` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `corporation` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `celestial_stargate` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `character_faction` CHANGE `system_id` `system_id` bigint unsigned;
ALTER TABLE `character_faction` CHANGE `militia_corporation_id` `militia_corporation_id` bigint unsigned;
ALTER TABLE `character_character` CHANGE `location_id` `location_id` bigint unsigned;
ALTER TABLE `agent` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `celestial_region` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `celestial_constellation` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `station` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `character_faction` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `celestial_system` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `character_player` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `item` CHANGE `location_id` `location_id` bigint unsigned;
ALTER TABLE `celestial_star` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `character_faction` CHANGE `corporation_id` `corporation_id` bigint unsigned;
ALTER TABLE `character_bloodline` CHANGE `corporation_id` `corporation_id` bigint unsigned;
ALTER TABLE `item` CHANGE `id` `id` bigint unsigned;
ALTER TABLE `corporation` ADD CONSTRAINT `FK_842A5683BF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `character` ADD CONSTRAINT `FK_937AB034BF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `celestial_stargate` ADD CONSTRAINT `FK_4F387BFDBF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `celestial_planet` ADD CONSTRAINT `FK_C8B2D185BF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `celestial_system` ADD CONSTRAINT `FK_69ECAAABBF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `character_faction` ADD CONSTRAINT `FK_EAA10BAD76B67878` FOREIGN KEY(militia_corporation_id) REFERENCES item(id);
ALTER TABLE `celestial` ADD CONSTRAINT `FK_2A089586BF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `character` ADD CONSTRAINT `FK_937AB034B2685369` FOREIGN KEY(corporation_id) REFERENCES item(id);
ALTER TABLE `celestial_moon` ADD CONSTRAINT `FK_6B89FEC7BF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `station` ADD CONSTRAINT `FK_9F39F8B1BF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `character_player` ADD CONSTRAINT `FK_3B5BB9F6BF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `character_faction` ADD CONSTRAINT `FK_EAA10BADD0952FA5` FOREIGN KEY(system_id) REFERENCES item(id);
ALTER TABLE `celestial_asteroid_belt` ADD CONSTRAINT `FK_E8E96FF8BF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `item` ADD CONSTRAINT `FK_1F1B251E64D218E` FOREIGN KEY(location_id) REFERENCES item(id);
ALTER TABLE `agent` ADD CONSTRAINT `FK_268B9C9DBF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `celestial_constellation` ADD CONSTRAINT `FK_FC982DFBF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `character_bloodline` ADD CONSTRAINT `FK_8C3691A7B2685369` FOREIGN KEY(corporation_id) REFERENCES item(id);
ALTER TABLE `character_faction` ADD CONSTRAINT `FK_EAA10BADBF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `character` ADD CONSTRAINT `FK_937AB034BF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `celestial_planet` ADD CONSTRAINT `FK_C8B2D185BF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `celestial_region` ADD CONSTRAINT `FK_AFC34A56BF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `celestial_asteroid_belt` ADD CONSTRAINT `FK_E8E96FF8BF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `celestial_star` ADD CONSTRAINT `FK_41BEE33BBF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `character_faction` ADD CONSTRAINT `FK_EAA10BADB2685369` FOREIGN KEY(corporation_id) REFERENCES item(id);
ALTER TABLE `celestial` ADD CONSTRAINT `FK_2A089586BF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `character` ADD CONSTRAINT `FK_937AB034B2685369` FOREIGN KEY(corporation_id) REFERENCES item(id);
ALTER TABLE `celestial_moon` ADD CONSTRAINT `FK_6B89FEC7BF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `corporation` ADD CONSTRAINT `FK_842A5683BF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `celestial_stargate` ADD CONSTRAINT `FK_4F387BFDBF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `character_faction` ADD CONSTRAINT `FK_EAA10BADD0952FA5` FOREIGN KEY(system_id) REFERENCES item(id);
ALTER TABLE `character_faction` ADD CONSTRAINT `FK_EAA10BAD76B67878` FOREIGN KEY(militia_corporation_id) REFERENCES item(id);
ALTER TABLE `character_character` ADD CONSTRAINT `FK_142A120F64D218E` FOREIGN KEY(location_id) REFERENCES item(id);
ALTER TABLE `agent` ADD CONSTRAINT `FK_268B9C9DBF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `celestial_region` ADD CONSTRAINT `FK_AFC34A56BF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `celestial_constellation` ADD CONSTRAINT `FK_FC982DFBF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `station` ADD CONSTRAINT `FK_9F39F8B1BF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `character_faction` ADD CONSTRAINT `FK_EAA10BADBF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `celestial_system` ADD CONSTRAINT `FK_69ECAAABBF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `character_player` ADD CONSTRAINT `FK_3B5BB9F6BF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `item` ADD CONSTRAINT `FK_1F1B251E64D218E` FOREIGN KEY(location_id) REFERENCES item(id);
ALTER TABLE `celestial_star` ADD CONSTRAINT `FK_41BEE33BBF396750` FOREIGN KEY(id) REFERENCES item(id);
ALTER TABLE `character_faction` ADD CONSTRAINT `FK_EAA10BADB2685369` FOREIGN KEY(corporation_id) REFERENCES item(id);
ALTER TABLE `character_bloodline` ADD CONSTRAINT `FK_8C3691A7B2685369` FOREIGN KEY(corporation_id) REFERENCES item(id)
