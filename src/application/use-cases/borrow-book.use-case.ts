import { BookRepository } from '../../domain/repositories/book.repository';
import { MemberRepository } from '../../domain/repositories/member.repository';

export class BorrowBookUseCase {
  constructor(
    private readonly memberRepository: MemberRepository,
    private readonly bookRepository: BookRepository,
  ) {}

  async execute(memberCode: string, bookCode: string): Promise<void> {
    const member = await this.memberRepository.findByCode(memberCode);
    const book = await this.bookRepository.findByCode(bookCode);

    if (!member || !book) {
      throw new Error('Member or Book not found');
    }

    if (book.stock === 0) {
      throw new Error('Book is not available');
    }

    member.borrowBook(bookCode);
    book.borrow();

    await this.memberRepository.save(member);
    await this.bookRepository.save(book);
  }
}
