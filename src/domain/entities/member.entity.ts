export class Member {
    private readonly _code: string;
    private readonly _name: string;
    private _borrowedBooks: string[] = [];
    private _penalizedUntil: Date | null = null;
  
    constructor(code: string, name: string) {
      this._code = code;
      this._name = name;
    }
  
    get code(): string {
      return this._code;
    }
  
    get name(): string {
      return this._name;
    }
  
    get borrowedBooks(): string[] {
      return this._borrowedBooks;
    }
  
    get isPenalized(): boolean {
      return this._penalizedUntil !== null && new Date() < this._penalizedUntil;
    }
  
    borrowBook(bookCode: string) {
      if (this._borrowedBooks.length >= 2) {
        throw new Error('Cannot borrow more than 2 books');
      }
      if (this.isPenalized) {
        throw new Error('Member is currently penalized');
      }
      this._borrowedBooks.push(bookCode);
    }
  
    returnBook(bookCode: string) {
      const index = this._borrowedBooks.indexOf(bookCode);
      if (index === -1) {
        throw new Error('Book not borrowed by this member');
      }
      this._borrowedBooks.splice(index, 1);
    }
  
    penalize(days: number) {
      const now = new Date();
      this._penalizedUntil = new Date(now.setDate(now.getDate() + days));
    }
  }

  