import { Member } from '../../domain/entities/member.entity';
import { MemberRepository } from '../../domain/repositories/member.repository';

const members: Member[] = [
  new Member('M001', 'Angga'),
  new Member('M002', 'Ferry'),
  new Member('M003', 'Putri'),
];

export class MockMemberRepository implements MemberRepository {
  async findByCode(code: string): Promise<Member | undefined> {
    return members.find(member => member.code === code);
  }

  async save(member: Member): Promise<void> {
    const index = members.findIndex(m => m.code === member.code);
    if (index > -1) {
      members[index] = member;
    }
  }
}
