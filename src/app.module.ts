import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { Book } from './books/book.entity';
import { Member } from './members/member.entity';
import { SeedService } from './seed.service';

@Module({
  imports: [
    TypeOrmModule.forFeature([Book, Member]),
  ],
 
